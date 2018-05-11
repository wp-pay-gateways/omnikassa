<?php

namespace Pronamic\WordPress\Pay\Gateways\OmniKassa;

/**
 * Title: OmniKassa payment mean brand list
 * Description:
 * Copyright: Copyright (c) 2005 - 2018
 * Company: Pronamic
 *
 * @author  Remco Tolsma
 * @version 2.0.0
 * @since   1.1.0
 */
class PaymentMeanBrandList {
	/**
	 * List
	 *
	 * @var array
	 */
	private $list;

	/**
	 * Constructs and initialize a payment methods list
	 *
	 * @parm array $list
	 */
	public function __construct( array $list = array() ) {
		$this->list = $list;
	}

	/**
	 * Add payment method
	 *
	 * @param string $payment_mean_brand
	 */
	public function add_payment_mean_brand( $payment_mean_brand ) {
		$this->list[] = $payment_mean_brand;
	}

	/**
	 * Create a string representation of this payment mean brand list
	 *
	 * @return string
	 */
	public function __toString() {
		return implode( ', ', $this->list );
	}
}
