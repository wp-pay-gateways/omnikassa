<?php

namespace Pronamic\WordPress\Pay\Gateways\OmniKassa;

use PHPUnit_Framework_TestCase;

/**
 * Title: OmniKassa locale helper test
 * Description:
 * Copyright: 2005-2019 Pronamic
 * Company: Pronamic
 *
 * @author  Remco Tolsma
 * @version 2.0.0
 * @since   1.1.3
 */
class LocaleHelperTest extends PHPUnit_Framework_TestCase {
	/**
	 * Test transform.
	 *
	 * @dataProvider status_matrix_provider
	 */
	public function test_transform( $locale, $expected ) {
		$language = LocaleHelper::transform( $locale );

		$this->assertEquals( $expected, $language );
	}

	public function status_matrix_provider() {
		return array(
			// Czech
			array( 'cs_CZ', Locales::CS ),
			// Welsh
			array( 'cy', Locales::CY ),
			// German
			array( 'de_DE', Locales::DE ),
			// German (Switzerland)
			array( 'de_CH', Locales::DE ),
			// English
			array( 'en_US', Locales::EN ),
			// English (Australia)
			array( 'en_AU', Locales::EN ),
			// English (Canada)
			array( 'en_CA', Locales::EN ),
			// English (South Africa)
			array( 'en_ZA', Locales::EN ),
			// English (UK)
			array( 'en_GB', Locales::EN ),
			// Spanish (Argentina)
			array( 'es_AR', Locales::ES ),
			// Spanish (Chile)
			array( 'es_CL', Locales::ES ),
			// Spanish (Colombia)
			array( 'es_CO', Locales::ES ),
			// Spanish (Mexico)
			array( 'es_MX', Locales::ES ),
			// Spanish (Peru)
			array( 'es_PE', Locales::ES ),
			// Spanish (Puerto Rico)
			array( 'es_PR', Locales::ES ),
			// Spanish (Spain)
			array( 'es_ES', Locales::ES ),
			// Spanish (Venezuela)
			array( 'es_VE', Locales::ES ),
			// French (Belgium)
			array( 'fr_BE', Locales::FR ),
			// French (Canada)
			array( 'fr_CA', Locales::FR ),
			// French (France)
			array( 'fr_FR', Locales::FR ),
			// Dutch
			array( 'nl_NL', Locales::NL ),
			// Dutch (Belgium)
			array( 'nl_BE', Locales::NL ),
			// Slovak
			array( 'sk_SK', Locales::SK ),
			// Not supported
			array( 'not supported language code', null ),
		);
	}
}
