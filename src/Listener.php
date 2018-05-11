<?php

namespace Pronamic\WordPress\Pay\Gateways\OmniKassa;

use Pronamic\WordPress\Pay\Plugin;

/**
 * Title: OmniKassa listener
 * Description:
 * Copyright: Copyright (c) 2005 - 2018
 * Company: Pronamic
 *
 * @author  Remco Tolsma
 * @version 2.0.0
 * @since   1.0.0
 */
class Listener {
	public static function listen() {
		if ( ! filter_has_var( INPUT_POST, 'Data' ) || ! filter_has_var( INPUT_POST, 'Seal' ) ) {
			return;
		}

		$input_data = filter_input( INPUT_POST, 'Data' );

		$data = Client::parse_piped_string( $input_data );

		$transaction_reference = $data['transactionReference'];

		$payment = get_pronamic_payment_by_meta( '_pronamic_payment_omnikassa_transaction_reference', $transaction_reference );

		if ( null === $payment ) {
			return;
		}

		// Add note.
		$note = sprintf(
			/* translators: %s: OmniKassa */
			__( 'Webhook requested by %s.', 'pronamic_ideal' ),
			__( 'OmniKassa', 'pronamic_ideal' )
		);

		$payment->add_note( $note );

		// Update payment.
		Plugin::update_payment( $payment );
	}
}
