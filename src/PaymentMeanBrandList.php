<?php

/**
 * Title: OmniKassa payment mean brand list
 * Description:
 * Copyright: Copyright (c) 2005 - 2017
 * Company: Pronamic
 *
 * @author Remco Tolsma
 * @version 1.1.0
 * @since 1.1.0
 */
class Pronamic_WP_Pay_Gateways_OmniKassa_PaymentMeanBrandList {
	/**
	 * List
	 *
	 * @var array
	 */
	private $list;

	//////////////////////////////////////////////////

	/**
	 * Constructs and initialize a payment methods list
	 */
	public function __construct( array $list = array() ) {
		$this->list = $list;
	}

	//////////////////////////////////////////////////

	/**
	 * Add payment method
	 *
	 * @param string $payment_method
	 */
	public function add_payment_mean_brand( $payment_mean_brand ) {
		$this->list[] = $payment_mean_brand;
	}

	//////////////////////////////////////////////////

	/**
	 * Create a string representation of this payment mean brand list
	 *
	 * @return string
	 */
	public function __toString() {
		return implode( ', ', $this->list );
	}
}
