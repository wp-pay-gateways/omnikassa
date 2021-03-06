<?php

namespace Pronamic\WordPress\Pay\Gateways\OmniKassa;

use WP_UnitTestCase;

class TestPaymentRequestSeal extends WP_UnitTestCase {
	/**
	 * Test payment request seal.
	 */
	public function test_seal() {
		$omnikassa = new Client();

		$omnikassa->set_amount( 55 );
		$omnikassa->set_currency_numeric_code( 978 );
		$omnikassa->set_merchant_id( '011223744550001' );
		$omnikassa->set_normal_return_url( 'http://www.normalreturnurl.nl' );
		$omnikassa->set_automatic_response_url( 'http://www.automaticresponseurl.nl' );
		$omnikassa->set_transaction_reference( '534654' );
		$omnikassa->set_order_id( '201208345' );
		$omnikassa->set_key_version( 1 );
		$omnikassa->set_secret_key( '002020000000001_KEY1' );

		$expected = '421cf499fae491858b8ba0b89d94b05dcc3895ab5c005f6c524f0dfe08b9ed68';

		$actual = $omnikassa->get_seal();

		$this->assertEquals( $expected, $actual );
	}
}
