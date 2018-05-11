<?php

namespace Pronamic\WordPress\Pay\Gateways\OmniKassa;

use PHPUnit_Framework_TestCase;
use Pronamic\WordPress\Pay\Core\Statuses;

/**
 * Title: OmniKassa response codes test
 * Description:
 * Copyright: Copyright (c) 2005 - 2018
 * Company: Pronamic
 *
 * @author  Remco Tolsma
 * @version 2.0.0
 * @since   1.0.0
 */
class ResponseCodesTest extends PHPUnit_Framework_TestCase {
	/**
	 * Test transform.
	 *
	 * @dataProvider status_matrix_provider
	 */
	public function test_transform( $response_code, $expected ) {
		$status = ResponseCodes::transform( $response_code );

		$this->assertEquals( $expected, $status );
	}

	public function status_matrix_provider() {
		return array(
			// Transaction successful.
			array( ResponseCodes::TRANSACTION_SUCCES, Statuses::SUCCESS ),
			// Credit card authorisation limit exceeded. Contact the Support Team Rabo OmniKassa.
			array( ResponseCodes::AUTHORIZATION_LIMIT, Statuses::FAILURE ),
			// Invalid merchant contract.
			array( ResponseCodes::INVALID_MERCHANT_CONTRACT, Statuses::FAILURE ),
			// Refused.
			array( ResponseCodes::AUTHORIZATION_REFUSED, Statuses::FAILURE ),
			// Invalid transaction. Check the fields in the payment request.
			array( ResponseCodes::INVALID_TRANSACTION, Statuses::FAILURE ),
			// Cancellation of payment by user.
			array( ResponseCodes::CANCELLATION_OF_PAYMENT, Statuses::CANCELLED ),
			// Invalid status.
			array( ResponseCodes::INVALID_STATUS, Statuses::FAILURE ),
			// Transaction not found in database.
			array( ResponseCodes::TRANSACTION_NOT_FOUND_IN_DATABASE, Statuses::FAILURE ),
			// Invalid format.
			array( ResponseCodes::INVALID_FORMAT, Statuses::FAILURE ),
			// Fraud suspicion.
			array( ResponseCodes::FRAUD_SUSPICION, Statuses::FAILURE ),
			// Operation not allowed for this merchant/webshop.
			array( ResponseCodes::OPERATION_NOT_ALLOWED, Statuses::FAILURE ),
			// Awaiting status report.
			array( ResponseCodes::PENDING_TRANSACTION, Statuses::OPEN ),
			// Security problem detected. Transaction terminated.
			array( ResponseCodes::SECURITY_BREACH_DETECTED, Statuses::FAILURE ),
			// Maximum number of attempts to enter credit card number (3) exceeded.
			array( ResponseCodes::NUMBER_ATTEMPT_EXCEEDED, Statuses::FAILURE ),
			// Rabo OmniKassa server temporarily unavailable.
			array( ResponseCodes::ACQUIRER_SERVER_TEMPORARILY_UNAVAILABLE, Statuses::FAILURE ),
			// Duplicate transaction.
			array( ResponseCodes::DUPLICATE_TRANSACTION, Statuses::FAILURE ),
			// Time period expired. Transaction refused.
			array( ResponseCodes::REQUEST_TIMEOUT, Statuses::EXPIRED ),
			// Payment page temporarily unavailable.
			array( ResponseCodes::PAYMENT_PAGE_TEMPORARILY_UNAVAILABLE, Statuses::OPEN ),
			// Not existing response code.
			array( 'not existing response code', null ),
		);
	}
}
