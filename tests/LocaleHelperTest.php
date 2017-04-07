<?php

/**
 * Title: OmniKassa locale helper test
 * Description:
 * Copyright: Copyright (c) 2005 - 2017
 * Company: Pronamic
 *
 * @author Remco Tolsma
 * @version 1.1.3
 * @since 1.1.3
 */
class Pronamic_WP_Pay_Gateways_OmniKassa_LocaleHelperTest extends PHPUnit_Framework_TestCase {
	/**
	 * Test transform.
	 *
	 * @dataProvider status_matrix_provider
	 */
	public function test_transform( $locale, $expected ) {
		$language = Pronamic_WP_Pay_Gateways_OmniKassa_LocaleHelper::transform( $locale );

		$this->assertEquals( $expected, $language );
	}

	public function status_matrix_provider() {
		return array(
			// Czech
			array( 'cs_CZ', Pronamic_WP_Pay_Gateways_OmniKassa_Locales::CS ),
			// Welsh
			array( 'cy', Pronamic_WP_Pay_Gateways_OmniKassa_Locales::CY ),
			// German
			array( 'de_DE', Pronamic_WP_Pay_Gateways_OmniKassa_Locales::DE ),
			// German (Switzerland)
			array( 'de_CH', Pronamic_WP_Pay_Gateways_OmniKassa_Locales::DE ),
			// English
			array( 'en_US', Pronamic_WP_Pay_Gateways_OmniKassa_Locales::EN ),
			// English (Australia)
			array( 'en_AU', Pronamic_WP_Pay_Gateways_OmniKassa_Locales::EN ),
			// English (Canada)
			array( 'en_CA', Pronamic_WP_Pay_Gateways_OmniKassa_Locales::EN ),
			// English (South Africa)
			array( 'en_ZA', Pronamic_WP_Pay_Gateways_OmniKassa_Locales::EN ),
			// English (UK)
			array( 'en_GB', Pronamic_WP_Pay_Gateways_OmniKassa_Locales::EN ),
			// Spanish (Argentina)
			array( 'es_AR', Pronamic_WP_Pay_Gateways_OmniKassa_Locales::ES ),
			// Spanish (Chile)
			array( 'es_CL', Pronamic_WP_Pay_Gateways_OmniKassa_Locales::ES ),
			// Spanish (Colombia)
			array( 'es_CO', Pronamic_WP_Pay_Gateways_OmniKassa_Locales::ES ),
			// Spanish (Mexico)
			array( 'es_MX', Pronamic_WP_Pay_Gateways_OmniKassa_Locales::ES ),
			// Spanish (Peru)
			array( 'es_PE', Pronamic_WP_Pay_Gateways_OmniKassa_Locales::ES ),
			// Spanish (Puerto Rico)
			array( 'es_PR', Pronamic_WP_Pay_Gateways_OmniKassa_Locales::ES ),
			// Spanish (Spain)
			array( 'es_ES', Pronamic_WP_Pay_Gateways_OmniKassa_Locales::ES ),
			// Spanish (Venezuela)
			array( 'es_VE', Pronamic_WP_Pay_Gateways_OmniKassa_Locales::ES ),
			// French (Belgium)
			array( 'fr_BE', Pronamic_WP_Pay_Gateways_OmniKassa_Locales::FR ),
			// French (Canada)
			array( 'fr_CA', Pronamic_WP_Pay_Gateways_OmniKassa_Locales::FR ),
			// French (France)
			array( 'fr_FR', Pronamic_WP_Pay_Gateways_OmniKassa_Locales::FR ),
			// Dutch
			array( 'nl_NL', Pronamic_WP_Pay_Gateways_OmniKassa_Locales::NL ),
			// Dutch (Belgium)
			array( 'nl_BE', Pronamic_WP_Pay_Gateways_OmniKassa_Locales::NL ),
			// Slovak
			array( 'sk_SK', Pronamic_WP_Pay_Gateways_OmniKassa_Locales::SK ),
			// Not supported
			array( 'not supported language code', null ),
		);
	}
}
