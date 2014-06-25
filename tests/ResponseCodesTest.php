<?php

/**
 * Title: Mollie statuses constants tests
 * Description:
 * Copyright: Copyright (c) 2005 - 2014
 * Company: Pronamic
 * @author Remco Tolsma
 * @version 1.0.0
 * @see https://www.mollie.nl/support/documentatie/betaaldiensten/ideal/en/
 */
class Pronamic_WP_Pay_OmniKassa_ResponseCodesTest extends PHPUnit_Framework_TestCase {
	/**
	 * @dataProvider statusMatrixProvider
	 */
	public function testTransform( $responseCode, $expected ) {
		$status = Pronamic_WP_Pay_OmniKassa_ResponseCodes::transform( $responseCode );

		$this->assertEquals( $expected, $status );
	}

	public function statusMatrixProvider() {
		return array(
			array( Pronamic_WP_Pay_OmniKassa_ResponseCodes::TRANSACTION_SUCCES, Pronamic_WP_Pay_Statuses::SUCCESS ),
			array( Pronamic_WP_Pay_OmniKassa_ResponseCodes::AUTHORIZATION_LIMIT, Pronamic_WP_Pay_Statuses::FAILURE ),
			array( Pronamic_WP_Pay_OmniKassa_ResponseCodes::AUTHORIZATION_REFUSED, Pronamic_WP_Pay_Statuses::FAILURE ),
			array( Pronamic_WP_Pay_OmniKassa_ResponseCodes::CANCELLATION_OF_PAYMENT, Pronamic_WP_Pay_Statuses::CANCELLED ),
			array( Pronamic_WP_Pay_OmniKassa_ResponseCodes::PENDING_TRANSACTION, Pronamic_WP_Pay_Statuses::OPEN ),
			array( Pronamic_WP_Pay_OmniKassa_ResponseCodes::REQUEST_TIMEOUT, Pronamic_WP_Pay_Statuses::EXPIRED ),
		);
    }
}
