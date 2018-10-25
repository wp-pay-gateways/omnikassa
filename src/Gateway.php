<?php

namespace Pronamic\WordPress\Pay\Gateways\OmniKassa;

use Pronamic\WordPress\Pay\Core\Gateway as Core_Gateway;
use Pronamic\WordPress\Pay\Core\PaymentMethods;
use Pronamic\WordPress\Pay\Payments\Payment;

/**
 * Title: OmniKassa
 * Description:
 * Copyright: Copyright (c) 2005 - 2018
 * Company: Pronamic
 *
 * @author  Remco Tolsma
 * @version 2.0.0
 * @since   1.0.0
 */
class Gateway extends Core_Gateway {
	/**
	 * Client.
	 *
	 * @var Client
	 */
	protected $client;

	/**
	 * Constructs and initializes an OmniKassa gateway
	 *
	 * @param Config $config Config.
	 */
	public function __construct( Config $config ) {
		parent::__construct( $config );

		$this->set_method( self::METHOD_HTML_FORM );

		// Client.
		$this->client = new Client();

		$action_url = Client::ACTION_URL_PRUDCTION;

		if ( self::MODE_TEST === $config->mode ) {
			$action_url = Client::ACTION_URL_TEST;
		}

		$this->client->set_action_url( $action_url );
		$this->client->set_merchant_id( $config->merchant_id );
		$this->client->set_key_version( $config->key_version );
		$this->client->set_secret_key( $config->secret_key );
	}

	/**
	 * Get supported payment methods
	 *
	 * @see Pronamic_WP_Pay_Gateway::get_supported_payment_methods()
	 */
	public function get_supported_payment_methods() {
		return array(
			PaymentMethods::IDEAL,
			PaymentMethods::CREDIT_CARD,
			PaymentMethods::DIRECT_DEBIT,
			PaymentMethods::BANCONTACT,
		);
	}

	/**
	 * Start
	 *
	 * @see Pronamic_WP_Pay_Gateway::start()
	 *
	 * @param Payment $payment Payment.
	 */
	public function start( Payment $payment ) {
		$transaction_reference = $payment->get_meta( 'omnikassa_transaction_reference' );

		if ( empty( $transaction_reference ) ) {
			$transaction_reference = md5( uniqid( '', true ) );

			$payment->set_meta( 'omnikassa_transaction_reference', $transaction_reference );
		}

		$payment->set_transaction_id( $transaction_reference );
		$payment->set_action_url( $this->client->get_action_url() );

		$language = null;

		if ( null !== $payment->get_customer() ) {
			$language = $payment->get_customer()->get_language();
		}

		$this->client->set_customer_language( LocaleHelper::transform( $language ) );
		$this->client->set_currency_numeric_code( $payment->get_total_amount()->get_currency()->get_numeric_code() );
		$this->client->set_order_id( $payment->format_string( $this->config->order_id ) );
		$this->client->set_normal_return_url( home_url( '/' ) );
		$this->client->set_automatic_response_url( home_url( '/' ) );
		$this->client->set_amount( $payment->get_total_amount()->get_cents() );
		$this->client->set_transaction_reference( $transaction_reference );

		switch ( $payment->get_method() ) {
			/*
			 * If this field is not supplied in the payment request, then
			 * by default the customer will be redirected to the Rabo
			 * OmniKassa payment page. On the payment page, the
			 * customer can choose from the payment methods
			 * offered by the Rabo OmniKassa. These are the payment
			 * methods: IDEAL, VISA, MASTERCARD,
			 * MAESTRO, V PAY and BCMC.
			 *
			 * Exception: the register services INCASSO (direct debit),
			 * ACCEPTGIRO (giro collection form) and REMBOURS
			 * (cash on delivery) are not displayed on the Rabo
			 * OmniKassa payment page by default.
			 * If you wish to offer these register services to the
			 * customer on the payment page, then you need to
			 * always populate the paymentMeanBrandList field with
			 * all the payment methods you wish to offer (provided
			 * these have been requested and activated): IDEAL,
			 * VISA, MASTERCARD, MAESTRO, VPAY, BCMC,
			 * INCASSO, ACCEPTGIRO, REMBOURS.
			 *
			 * If you let the customer choose the payment method
			 * while still in your webshop, then you must populate
			 * this field of the payment request with only the selected
			 * payment method. Populating this field with only one
			 * payment method will instruct the Rabo OmniKassa to
			 * redirect the customer directly to the payment page for
			 * this payment method.
			 */
			case PaymentMethods::BANCONTACT:
			case PaymentMethods::MISTER_CASH:
				$this->client->add_payment_mean_brand( Methods::BCMC );

				break;
			case PaymentMethods::CREDIT_CARD:
				$this->client->add_payment_mean_brand( Methods::MAESTRO );
				$this->client->add_payment_mean_brand( Methods::MASTERCARD );
				$this->client->add_payment_mean_brand( Methods::VISA );
				$this->client->add_payment_mean_brand( Methods::VPAY );

				break;
			case PaymentMethods::DIRECT_DEBIT:
				$this->client->add_payment_mean_brand( Methods::INCASSO );

				break;
			case PaymentMethods::MAESTRO:
				$this->client->add_payment_mean_brand( Methods::MAESTRO );

				break;
			case PaymentMethods::IDEAL:
				$this->client->add_payment_mean_brand( Methods::IDEAL );

				break;
			default:
				$this->client->add_payment_mean_brand( Methods::IDEAL );
				$this->client->add_payment_mean_brand( Methods::VISA );
				$this->client->add_payment_mean_brand( Methods::MASTERCARD );
				$this->client->add_payment_mean_brand( Methods::MAESTRO );
				$this->client->add_payment_mean_brand( Methods::VPAY );
				$this->client->add_payment_mean_brand( Methods::BCMC );
				$this->client->add_payment_mean_brand( Methods::INCASSO );
				$this->client->add_payment_mean_brand( Methods::ACCEPTGIRO );
				$this->client->add_payment_mean_brand( Methods::REMBOURS );

				break;
		}
	}

	/**
	 * Get the output HTML
	 *
	 * @since 1.1.2
	 * @see   Pronamic_WP_Pay_Gateway::get_output_html()
	 */
	public function get_output_fields() {
		return $this->client->get_fields();
	}

	/**
	 * Update status of the specified payment
	 *
	 * @param Payment $payment Payment.
	 */
	public function update_status( Payment $payment ) {
		$input_data = filter_input( INPUT_POST, 'Data' );
		$input_seal = filter_input( INPUT_POST, 'Seal', FILTER_SANITIZE_STRING );

		$data = Client::parse_piped_string( $input_data );

		$seal = Client::compute_seal( $input_data, $this->config->secret_key );

		// Check if the posted seal is equal to our seal.
		if ( 0 === strcasecmp( $input_seal, $seal ) ) {
			$response_code = $data['responseCode'];

			$status = ResponseCodes::transform( $response_code );

			// Set the status of the payment.
			$payment->set_status( $status );

			$labels = array(
				'amount'               => __( 'Amount', 'pronamic_ideal' ),
				'captureDay'           => _x( 'Capture Day', 'creditcard', 'pronamic_ideal' ),
				'captureMode'          => _x( 'Capture Mode', 'creditcard', 'pronamic_ideal' ),
				'currencyCode'         => __( 'Currency Code', 'pronamic_ideal' ),
				'merchantId'           => __( 'Merchant ID', 'pronamic_ideal' ),
				'orderId'              => __( 'Order ID', 'pronamic_ideal' ),
				'transactionDateTime'  => __( 'Transaction Date Time', 'pronamic_ideal' ),
				'transactionReference' => __( 'Transaction Reference', 'pronamic_ideal' ),
				'keyVersion'           => __( 'Key Version', 'pronamic_ideal' ),
				'authorisationId'      => __( 'Authorisation ID', 'pronamic_ideal' ),
				'paymentMeanBrand'     => __( 'Payment Mean Brand', 'pronamic_ideal' ),
				'paymentMeanType'      => __( 'Payment Mean Type', 'pronamic_ideal' ),
				'responseCode'         => __( 'Response Code', 'pronamic_ideal' ),
			);

			$note = '';

			$note .= '<p>';
			$note .= __( 'OmniKassa transaction data in response message:', 'pronamic_ideal' );
			$note .= '</p>';

			$note .= '<dl>';

			foreach ( $labels as $key => $label ) {
				if ( isset( $data[ $key ] ) ) {
					$note .= sprintf( '<dt>%s</dt>', esc_html( $label ) );
					$note .= sprintf( '<dd>%s</dd>', esc_html( $data[ $key ] ) );
				}
			}

			$note .= '</dl>';

			$payment->add_note( $note );
		}
	}
}
