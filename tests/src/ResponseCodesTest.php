<?php

namespace Pronamic\WordPress\Pay\Gateways\OmniKassa;

use PHPUnit_Framework_TestCase;
use Pronamic\WordPress\Pay\Payments\PaymentStatus;

/**
 * Title: OmniKassa response codes test
 * Description:
 * Copyright: 2005-2020 Pronamic
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
			array( ResponseCodes::TRANSACTION_SUCCES, PaymentStatus::SUCCESS ),
			// Credit card authorisation limit exceeded. Contact the Support Team Rabo OmniKassa.
			array( ResponseCodes::AUTHORIZATION_LIMIT, PaymentStatus::FAILURE ),
			// Invalid merchant contract.
			array( ResponseCodes::INVALID_MERCHANT_CONTRACT, PaymentStatus::FAILURE ),
			// Refused.
			array( ResponseCodes::AUTHORIZATION_REFUSED, PaymentStatus::FAILURE ),
			// Invalid transaction. Check the fields in the payment request.
			array( ResponseCodes::INVALID_TRANSACTION, PaymentStatus::FAILURE ),
			// Cancellation of payment by user.
			array( ResponseCodes::CANCELLATION_OF_PAYMENT, PaymentStatus::CANCELLED ),
			// Invalid status.
			array( ResponseCodes::INVALID_STATUS, PaymentStatus::FAILURE ),
			// Transaction not found in database.
			array( ResponseCodes::TRANSACTION_NOT_FOUND_IN_DATABASE, PaymentStatus::FAILURE ),
			// Invalid format.
			array( ResponseCodes::INVALID_FORMAT, PaymentStatus::FAILURE ),
			// Fraud suspicion.
			array( ResponseCodes::FRAUD_SUSPICION, PaymentStatus::FAILURE ),
			// Operation not allowed for this merchant/webshop.
			array( ResponseCodes::OPERATION_NOT_ALLOWED, PaymentStatus::FAILURE ),
			// Awaiting status report.
			array( ResponseCodes::PENDING_TRANSACTION, PaymentStatus::OPEN ),
			// Security problem detected. Transaction terminated.
			array( ResponseCodes::SECURITY_BREACH_DETECTED, PaymentStatus::FAILURE ),
			// Maximum number of attempts to enter credit card number (3) exceeded.
			array( ResponseCodes::NUMBER_ATTEMPT_EXCEEDED, PaymentStatus::FAILURE ),
			// Rabo OmniKassa server temporarily unavailable.
			array( ResponseCodes::ACQUIRER_SERVER_TEMPORARILY_UNAVAILABLE, PaymentStatus::FAILURE ),
			// Duplicate transaction.
			array( ResponseCodes::DUPLICATE_TRANSACTION, PaymentStatus::FAILURE ),
			// Time period expired. Transaction refused.
			array( ResponseCodes::REQUEST_TIMEOUT, PaymentStatus::EXPIRED ),
			// Payment page temporarily unavailable.
			array( ResponseCodes::PAYMENT_PAGE_TEMPORARILY_UNAVAILABLE, PaymentStatus::OPEN ),
			// Not existing response code.
			array( 'not existing response code', null ),
		);
	}
}
