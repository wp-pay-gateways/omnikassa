<?php

namespace Pronamic\WordPress\Pay\Gateways\OmniKassa;

use Pronamic\WordPress\Pay\Core\GatewayConfig;

/**
 * Title: OmniKassa config
 * Description:
 * Copyright: Copyright (c) 2005 - 2018
 * Company: Pronamic
 *
 * @author  Remco Tolsma
 * @version 1.1.6
 * @since   1.0.0
 */
class Config extends GatewayConfig {
	public $merchant_id;

	public $secret_key;

	public $key_version;

	public $order_id;

	public function get_gateway_class() {
		return __NAMESPACE__ . '\Gateway';
	}
}
