<?php
use Pronamic\WordPress\Pay\Gateways\OmniKassa\PaymentMeanBrandList;
use Pronamic\WordPress\Pay\Gateways\OmniKassa\Methods;

/**
 * Title: OmniKassa payment mean brand list test
 * Description:
 * Copyright: Copyright (c) 2005 - 2018
 * Company: Pronamic
 *
 * @author Remco Tolsma
 * @version 1.1.0
 * @since 1.1.0
 */
class Pronamic_WP_Pay_Gateways_OmniKassa_PaymentMeanBrandListTest extends WP_UnitTestCase {
	/**
	 * Test constructor
	 */
	function test_constructor() {
		$list = new PaymentMeanBrandList( array(
			Methods::IDEAL,
			Methods::INCASSO,
		) );

		$string = (string) $list;

		$this->assertEquals( 'IDEAL, INCASSO', $string );
	}

	/**
	 * Test add payment method
	 */
	function test_add_payment_method() {
		$list = new PaymentMeanBrandList();
		$list->add_payment_mean_brand( Methods::IDEAL );
		$list->add_payment_mean_brand( Methods::INCASSO );

		$string = (string) $list;

		$this->assertEquals( 'IDEAL, INCASSO', $string );
	}
}
