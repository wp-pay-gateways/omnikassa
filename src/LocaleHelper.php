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
	 * Get OmniKassa locale for the specified language.
	 *
	 * @param string $language Language to transform to OmniKassa locale.
	 *
	 * @return string|null
	 */
	public static function transform( $language ) {
		if ( ! is_string( $language ) ) {
			return null;
		}

		// Supported locales.
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

		// Sub string.
		$locale = substr( $language, 0, 2 );

		// Upper case.
		$locale = strtoupper( $locale );

		// Is supported?
		if ( in_array( $locale, $supported, true ) ) {
			return $locale;
		}

		return null;
	}
}
