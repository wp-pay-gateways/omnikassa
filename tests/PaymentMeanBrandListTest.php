<?php

/**
 * Title: OmniKassa payment mean brand list test
 * Description:
 * Copyright: Copyright (c) 2005 - 2016
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
		$list = new Pronamic_WP_Pay_Gateways_OmniKassa_PaymentMeanBrandList( array(
			Pronamic_WP_Pay_Gateways_OmniKassa_PaymentMethods::IDEAL,
			Pronamic_WP_Pay_Gateways_OmniKassa_PaymentMethods::INCASSO,
		) );

		$string = (string) $list;

		$this->assertEquals( 'IDEAL, INCASSO', $string );
	}

	/**
	 * Test add payment method
	 */
	function test_add_payment_method() {
		$list = new Pronamic_WP_Pay_Gateways_OmniKassa_PaymentMeanBrandList();
		$list->add_payment_mean_brand( Pronamic_WP_Pay_Gateways_OmniKassa_PaymentMethods::IDEAL );
		$list->add_payment_mean_brand( Pronamic_WP_Pay_Gateways_OmniKassa_PaymentMethods::INCASSO );

		$string = (string) $list;

		$this->assertEquals( 'IDEAL, INCASSO', $string );
	}
}
