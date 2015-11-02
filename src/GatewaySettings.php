<?php

/**
 * Title: iDEAL gateway settings
 * Description:
 * Copyright: Copyright (c) 2005 - 2015
 * Company: Pronamic
 * @author Remco Tolsma
 * @version 1.2.0
 * @since 1.2.0
 */
class Pronamic_WP_Pay_Gateways_OmniKassa_GatewaySettings extends Pronamic_WP_Pay_Admin_GatewaySettings {
	public function __construct() {
		add_filter( 'pronamic_pay_gateway_sections', array( $this, 'sections' ) );
		add_filter( 'pronamic_pay_gateway_fields', array( $this, 'fields' ) );
	}

	public function sections( array $sections ) {
		// iDEAL
		$sections['omnikassa'] = array(
			'title'   => __( 'OmniKassa', 'pronamic_ideal' ),
			'methods' => array( 'omnikassa' ),
		);

		// Return
		return $sections;
	}

	public function fields( array $fields ) {
		// Partner ID
		$fields[] = array(
			'section'     => 'omnikassa',
			'meta_key'    => '_pronamic_gateway_omnikassa_merchant_id',
			'title'       => __( 'Merchant ID', 'pronamic_ideal' ),
			'type'        => 'text',
			'classes'     => array( 'code' ),
		);

		$fields[] = array(
			'section'     => 'omnikassa',
			'meta_key'    => '_pronamic_gateway_omnikassa_secret_key',
			'title'       => __( 'Secret Key', 'pronamic_ideal' ),
			'type'        => 'text',
			'classes'     => array( 'large-text', 'code' ),
		);

		$fields[] = array(
			'section'     => 'omnikassa',
			'meta_key'    => '_pronamic_gateway_omnikassa_key_version',
			'title'       => __( 'Key Version', 'pronamic_ideal' ),
			'type'        => 'text',
			'classes'     => array( 'small-text', 'code' ),
			'description' => sprintf( __( 'You can find the key version in the <a href="%s" target="_blank">OmniKassa Download Dashboard</a>.', 'pronamic_ideal' ), 'https://download.omnikassa.rabobank.nl/' ),
		);

		// Return
		return $fields;
	}
}
