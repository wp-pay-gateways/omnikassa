<?php

namespace Pronamic\WordPress\Pay\Gateways\OmniKassa;

use WP_UnitTestCase;

/**
 * Title: OmniKassa payment mean brand list test
 * Description:
 * Copyright: 2005-2020 Pronamic
 * Company: Pronamic
 *
 * @author  Remco Tolsma
 * @version 2.0.0
 * @since   1.1.0
 */
class PaymentMeanBrandListTest extends WP_UnitTestCase {
	/**
	 * Test constructor
	 */
	public function test_constructor() {
		$list = new PaymentMeanBrandList(
			array(
				Methods::IDEAL,
				Methods::INCASSO,
			)
		);

		$string = (string) $list;

		$this->assertEquals( 'IDEAL, INCASSO', $string );
	}

	/**
	 * Test add payment method
	 */
	public function test_add_payment_method() {
		$list = new PaymentMeanBrandList();
		$list->add_payment_mean_brand( Methods::IDEAL );
		$list->add_payment_mean_brand( Methods::INCASSO );

		$string = (string) $list;

		$this->assertEquals( 'IDEAL, INCASSO', $string );
	}
}
