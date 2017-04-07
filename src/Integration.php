<?php

/**
 * Title: OmniKassa integration
 * Description:
 * Copyright: Copyright (c) 2005 - 2017
 * Company: Pronamic
 *
 * @author Remco Tolsma
 * @version 1.1.6
 * @since 1.0.0
 */
class Pronamic_WP_Pay_Gateways_OmniKassa_Integration extends Pronamic_WP_Pay_Gateways_AbstractIntegration {
	public function __construct() {
		$this->id            = 'rabobank-omnikassa';
		$this->name          = 'Rabobank - OmniKassa';
		$this->product_url = 'https://www.rabobank.nl/bedrijven/betalen/geld-ontvangen/rabo-omnikassa/';
		$this->dashboard_url = array(
			__( 'admin', 'pronamic_ideal' ) => 'https://dashboard.omnikassa.rabobank.nl/',
			__( 'download', 'pronamic_ideal' ) => 'https://download.omnikassa.rabobank.nl/',
		);
		$this->provider      = 'rabobank';

		// Actions
		$function = array( 'Pronamic_WP_Pay_Gateways_OmniKassa_Listener', 'listen' );

		if ( ! has_action( 'wp_loaded', $function ) ) {
			add_action( 'wp_loaded', $function );
		}
	}

	public function get_config_factory_class() {
		return 'Pronamic_WP_Pay_Gateways_OmniKassa_ConfigFactory';
	}

	public function get_settings_class() {
		return 'Pronamic_WP_Pay_Gateways_OmniKassa_Settings';
	}

	/**
	 * Get required settings for this integration.
	 *
	 * @see https://github.com/wp-premium/gravityforms/blob/1.9.16/includes/fields/class-gf-field-multiselect.php#L21-L42
	 * @since 1.1.6
	 * @return array
	 */
	public function get_settings() {
		$settings = parent::get_settings();

		$settings[] = 'omnikassa';

		return $settings;
	}
}
