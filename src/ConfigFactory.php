<?php

namespace Pronamic\WordPress\Pay\Gateways\OmniKassa;

use Pronamic\WordPress\Pay\Core\GatewayConfigFactory;

/**
 * Title: OmniKassa config factory
 * Description:
 * Copyright: Copyright (c) 2005 - 2018
 * Company: Pronamic
 *
 * @author  Remco Tolsma
 * @version 2.0.0
 * @since   1.0.0
 */
class ConfigFactory extends GatewayConfigFactory {
	public function get_config( $post_id ) {
		$config = new Config();

		$config->merchant_id = get_post_meta( $post_id, '_pronamic_gateway_omnikassa_merchant_id', true );
		$config->secret_key  = get_post_meta( $post_id, '_pronamic_gateway_omnikassa_secret_key', true );
		$config->key_version = get_post_meta( $post_id, '_pronamic_gateway_omnikassa_key_version', true );
		$config->order_id    = get_post_meta( $post_id, '_pronamic_gateway_omnikassa_order_id', true );
		$config->mode        = get_post_meta( $post_id, '_pronamic_gateway_mode', true );

		return $config;
	}
}
