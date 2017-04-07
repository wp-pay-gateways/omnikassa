<?php

/**
 * Title: iDEAL gateway settings
 * Description:
 * Copyright: Copyright (c) 2005 - 2017
 * Company: Pronamic
 *
 * @author Remco Tolsma
 * @version 1.2.1
 * @since 1.0.0
 */
class Pronamic_WP_Pay_Gateways_OmniKassa_Settings extends Pronamic_WP_Pay_GatewaySettings {
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

		// Advanced
		$sections['omnikassa_advanced'] = array(
			'title'   => __( 'Advanced', 'pronamic_ideal' ),
			'methods' => array( 'omnikassa' ),
		);

		return $sections;
	}

	public function fields( array $fields ) {
		// Merchant ID
		$fields[] = array(
			'filter'      => FILTER_SANITIZE_STRING,
			'section'     => 'omnikassa',
			'meta_key'    => '_pronamic_gateway_omnikassa_merchant_id',
			'title'       => __( 'Merchant ID', 'pronamic_ideal' ),
			'type'        => 'text',
			'classes'     => array( 'code' ),
		);

		// Secret Key
		$fields[] = array(
			'filter'      => FILTER_SANITIZE_STRING,
			'section'     => 'omnikassa',
			'meta_key'    => '_pronamic_gateway_omnikassa_secret_key',
			'title'       => __( 'Secret Key', 'pronamic_ideal' ),
			'type'        => 'text',
			'classes'     => array( 'large-text', 'code' ),
		);

		// Key Version
		$fields[] = array(
			'filter'      => FILTER_SANITIZE_STRING,
			'section'     => 'omnikassa',
			'meta_key'    => '_pronamic_gateway_omnikassa_key_version',
			'title'       => __( 'Key Version', 'pronamic_ideal' ),
			'type'        => 'text',
			'classes'     => array( 'code' ),
			'size'        => 5,
			'description' => sprintf( __( 'You can find the key version in the <a href="%s" target="_blank">OmniKassa Download Dashboard</a>.', 'pronamic_ideal' ), 'https://download.omnikassa.rabobank.nl/' ),
		);

		// Purchase ID
		$fields[] = array(
			'filter'      => FILTER_SANITIZE_STRING,
			'section'     => 'omnikassa_advanced',
			'meta_key'    => '_pronamic_gateway_omnikassa_order_id',
			'title'       => __( 'Order ID', 'pronamic_ideal' ),
			'type'        => 'text',
			'classes'     => array( 'regular-text', 'code' ),
			'tooltip'     => sprintf(
				__( 'The OmniKassa %s parameter.', 'pronamic_ideal' ),
				sprintf( '<code>%s</code>', 'orderId' )
			),
			'description' => sprintf(
				'%s %s<br />%s',
				__( 'Available tags:', 'pronamic_ideal' ),
				sprintf(
					'<code>%s</code> <code>%s</code>',
					'{order_id}',
					'{payment_id}'
				),
				sprintf(
					__( 'Default: <code>%s</code>', 'pronamic_ideal' ),
					'{payment_id}'
				)
			),
		);

		return $fields;
	}
}
