<?php

/**
 * Title: OmniKassa response codes test
 * Description:
 * Copyright: Copyright (c) 2005 - 2016
 * Company: Pronamic
 *
 * @author Remco Tolsma
 * @version 1.0.0
 */
class Pronamic_WP_Pay_Gateways_OmniKassa_ResponseCodesTest extends PHPUnit_Framework_TestCase {
	/**
	 * Test transform.
	 *
	 * @dataProvider status_matrix_provider
	 */
	public function test_transform( $response_code, $expected ) {
		$status = Pronamic_WP_Pay_Gateways_OmniKassa_ResponseCodes::transform( $response_code );

		$this->assertEquals( $expected, $status );
	}

	public function status_matrix_provider() {
		return array(
			// Transaction successful.
			array( Pronamic_WP_Pay_Gateways_OmniKassa_ResponseCodes::TRANSACTION_SUCCES, Pronamic_WP_Pay_Statuses::SUCCESS ),
			// Credit card authorisation limit exceeded. Contact the Support Team Rabo OmniKassa.
			array( Pronamic_WP_Pay_Gateways_OmniKassa_ResponseCodes::AUTHORIZATION_LIMIT, Pronamic_WP_Pay_Statuses::FAILURE ),
			// Invalid merchant contract.
			array( Pronamic_WP_Pay_Gateways_OmniKassa_ResponseCodes::INVALID_MERCHANT_CONTRACT, Pronamic_WP_Pay_Statuses::FAILURE ),
			// Refused.
			array( Pronamic_WP_Pay_Gateways_OmniKassa_ResponseCodes::AUTHORIZATION_REFUSED, Pronamic_WP_Pay_Statuses::FAILURE ),
			// Invalid transaction. Check the fields in the payment request.
			array( Pronamic_WP_Pay_Gateways_OmniKassa_ResponseCodes::INVALID_TRANSACTION, Pronamic_WP_Pay_Statuses::FAILURE ),
			// Cancellation of payment by user.
			array( Pronamic_WP_Pay_Gateways_OmniKassa_ResponseCodes::CANCELLATION_OF_PAYMENT, Pronamic_WP_Pay_Statuses::CANCELLED ),
			// Invalid status.
			array( Pronamic_WP_Pay_Gateways_OmniKassa_ResponseCodes::INVALID_STATUS, Pronamic_WP_Pay_Statuses::FAILURE ),
			// Transaction not found in database.
			array( Pronamic_WP_Pay_Gateways_OmniKassa_ResponseCodes::TRANSACTION_NOT_FOUND_IN_DATABASE, Pronamic_WP_Pay_Statuses::FAILURE ),
			// Invalid format.
			array( Pronamic_WP_Pay_Gateways_OmniKassa_ResponseCodes::INVALID_FORMAT, Pronamic_WP_Pay_Statuses::FAILURE ),
			// Fraud suspicion.
			array( Pronamic_WP_Pay_Gateways_OmniKassa_ResponseCodes::FRAUD_SUSPICION, Pronamic_WP_Pay_Statuses::FAILURE ),
			// Operation not allowed for this merchant/webshop.
			array( Pronamic_WP_Pay_Gateways_OmniKassa_ResponseCodes::OPERATION_NOT_ALLOWED, Pronamic_WP_Pay_Statuses::FAILURE ),
			// Awaiting status report.
			array( Pronamic_WP_Pay_Gateways_OmniKassa_ResponseCodes::PENDING_TRANSACTION, Pronamic_WP_Pay_Statuses::OPEN ),
			// Security problem detected. Transaction terminated.
			array( Pronamic_WP_Pay_Gateways_OmniKassa_ResponseCodes::SECURITY_BREACH_DETECTED, Pronamic_WP_Pay_Statuses::FAILURE ),
			// Maximum number of attempts to enter credit card number (3) exceeded.
			array( Pronamic_WP_Pay_Gateways_OmniKassa_ResponseCodes::NUMBER_ATTEMPT_EXCEEDED, Pronamic_WP_Pay_Statuses::FAILURE ),
			// Rabo OmniKassa server temporarily unavailable.
			array( Pronamic_WP_Pay_Gateways_OmniKassa_ResponseCodes::ACQUIRER_SERVER_TEMPORARILY_UNAVAILABLE, Pronamic_WP_Pay_Statuses::FAILURE ),
			// Duplicate transaction.
			array( Pronamic_WP_Pay_Gateways_OmniKassa_ResponseCodes::DUPLICATE_TRANSACTION, Pronamic_WP_Pay_Statuses::FAILURE ),
			// Time period expired. Transaction refused.
			array( Pronamic_WP_Pay_Gateways_OmniKassa_ResponseCodes::REQUEST_TIMEOUT, Pronamic_WP_Pay_Statuses::EXPIRED ),
			// Payment page temporarily unavailable.
			array( Pronamic_WP_Pay_Gateways_OmniKassa_ResponseCodes::PAYMENT_PAGE_TEMPORARILY_UNAVAILABLE, Pronamic_WP_Pay_Statuses::OPEN ),
			// Not existing response code.
			array( 'not existing response code', null ),
		);
	}
}
