<?php

class Pronamic_WP_Pay_Gateways_OmniKassa_Integration extends Pronamic_WP_Pay_Gateways_AbstractIntegration {
	public function __construct() {
		$this->id            = 'rabobank-omnikassa';
		$this->name          = 'Rabobank - OmniKassa';
		$this->dashboard_url = 'https://dashboard.omnikassa.rabobank.nl/';
		$this->provider      = 'rabobank';

		// Actions
		add_action( 'wp_loaded', array( $this, 'check_response' ) );
	}

	public function check_response() {
		Pronamic_WP_Pay_Gateways_OmniKassa_Listener::listen();
	}

	public function get_config_factory_class() {
		return 'Pronamic_WP_Pay_Gateways_OmniKassa_ConfigFactory';
	}

	public function get_config_class() {
		return 'Pronamic_WP_Pay_Gateways_OmniKassa_Config';
	}

	public function get_settings_class() {
		return 'Pronamic_WP_Pay_Gateways_OmniKassa_Settings';
	}

	public function get_gateway_class() {
		return 'Pronamic_WP_Pay_Gateways_OmniKassa_Gateway';
	}
}
