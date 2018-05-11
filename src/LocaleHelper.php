<?php

namespace Pronamic\WordPress\Pay\Gateways\OmniKassa;

/**
 * Title: OmniKassa locale helper
 * Description:
 * Copyright: Copyright (c) 2005 - 2018
 * Company: Pronamic
 *
 * @author  Remco Tolsma
 * @version 2.0.0
 * @since   1.1.3
 */
class LocaleHelper {
	/**
	 * Get OmniKassa locale by the specified WordPress locale
	 *
	 * @return string|null
	 */
	public static function transform( $locale ) {
		// Supported locales
		$supported = array(
			Locales::CS,
			Locales::CY,
			Locales::DE,
			Locales::EN,
			Locales::ES,
			Locales::FR,
			Locales::NL,
			Locales::SK,
		);

		// Sub string
		$locale = substr( $locale, 0, 2 );

		// Lower case
		$locale = strtoupper( $locale );

		// Is supported?
		if ( in_array( $locale, $supported, true ) ) {
			return $locale;
		}

		return null;
	}
}
