<?php

namespace Pronamic\WordPress\Pay\Gateways\OmniKassa;

use WP_UnitTestCase;

class TestPaymentRequestData extends WP_UnitTestCase {
	/**
	 * Test payment request data.
	 */
	public function test_data() {
		$omnikassa = new Client();

		$omnikassa->set_amount( 55 );
		$omnikassa->set_currency_numeric_code( 978 );
		$omnikassa->set_merchant_id( '011223744550001' );
		$omnikassa->set_normal_return_url( 'http://www.normalreturnurl.nl' );
		$omnikassa->set_automatic_response_url( 'http://www.automaticresponseurl.nl' );
		$omnikassa->set_transaction_reference( '534654' );
		$omnikassa->set_order_id( '201208345' );
		$omnikassa->set_key_version( 1 );

		$string = 'amount=55|currencyCode=978|merchantId=011223744550001|normalReturnUrl=http://www.normalreturnurl.nl|automaticResponseUrl=http://www.automaticresponseurl.nl|transactionReference=534654|orderId=201208345|keyVersion=1';

		$expected = Client::parse_piped_string( $string );

		$actual = $omnikassa->get_data_array();

		$this->assertEquals( $expected, $actual );
	}
}
