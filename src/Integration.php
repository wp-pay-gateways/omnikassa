<?php

namespace Pronamic\WordPress\Pay\Gateways\OmniKassa;

use Pronamic\WordPress\Pay\Gateways\Common\AbstractIntegration;

/**
 * Title: OmniKassa integration
 * Description:
 * Copyright: 2005-2019 Pronamic
 * Company: Pronamic
 *
 * @author  Remco Tolsma
 * @version 2.0.3
 * @since   1.0.0
 */
class Integration extends AbstractIntegration {
	public function __construct() {
		$this->id            = 'rabobank-omnikassa';
		$this->name          = 'Rabobank - OmniKassa';
		$this->product_url   = 'https://www.rabobank.nl/bedrijven/betalen/geld-ontvangen/rabo-omnikassa/';
		$this->dashboard_url = array(
			__( 'admin', 'pronamic_ideal' )    => 'https://dashboard.omnikassa.rabobank.nl/',
			__( 'download', 'pronamic_ideal' ) => 'https://download.omnikassa.rabobank.nl/',
		);
		$this->provider      = 'rabobank';
		$this->deprecated    = true;

		// Actions
		$function = array( __NAMESPACE__ . '\Listener', 'listen' );

		if ( ! has_action( 'wp_loaded', $function ) ) {
			add_action( 'wp_loaded', $function );
		}
	}

	/**
	 * Get settings fields.
	 *
	 * @return array
	 */
	public function get_settings_fields() {
		$fields = array();

		// Merchant ID
		$fields[] = array(
			'section'  => 'general',
			'filter'   => FILTER_SANITIZE_STRING,
			'meta_key' => '_pronamic_gateway_omnikassa_merchant_id',
			'title'    => __( 'Merchant ID', 'pronamic_ideal' ),
			'type'     => 'text',
			'classes'  => array( 'code' ),
		);

		// Secret Key
		$fields[] = array(
			'section'  => 'general',
			'filter'   => FILTER_SANITIZE_STRING,
			'meta_key' => '_pronamic_gateway_omnikassa_secret_key',
			'title'    => __( 'Secret Key', 'pronamic_ideal' ),
			'type'     => 'text',
			'classes'  => array( 'large-text', 'code' ),
		);

		// Key Version
		$fields[] = array(
			'section'  => 'general',
			'filter'      => FILTER_SANITIZE_STRING,
			'meta_key'    => '_pronamic_gateway_omnikassa_key_version',
			'title'       => __( 'Key Version', 'pronamic_ideal' ),
			'type'        => 'text',
			'classes'     => array( 'code' ),
			'size'        => 5,
			'description' => sprintf( __( 'You can find the key version in the <a href="%s" target="_blank">OmniKassa Download Dashboard</a>.', 'pronamic_ideal' ), 'https://download.omnikassa.rabobank.nl/' ),
		);

		// Purchase ID
		$fields[] = array(
			'section'     => 'advanced',
			'filter'      => FILTER_SANITIZE_STRING,
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

	public function get_config( $post_id ) {
		$config = new Config();

		$config->merchant_id = get_post_meta( $post_id, '_pronamic_gateway_omnikassa_merchant_id', true );
		$config->secret_key  = get_post_meta( $post_id, '_pronamic_gateway_omnikassa_secret_key', true );
		$config->key_version = get_post_meta( $post_id, '_pronamic_gateway_omnikassa_key_version', true );
		$config->order_id    = get_post_meta( $post_id, '_pronamic_gateway_omnikassa_order_id', true );
		$config->mode        = get_post_meta( $post_id, '_pronamic_gateway_mode', true );

		return $config;
	}

	/**
	 * Get gateway.
	 *
	 * @param int $post_id Post ID.
	 * @return Gateway
	 */
	public function get_gateway( $post_id ) {
		return new Gateway( $this->get_config( $post_id ) );
	}
}
