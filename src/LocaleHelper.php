<?php

/**
 * Title: OmniKassa locale helper
 * Description:
 * Copyright: Copyright (c) 2005 - 2015
 * Company: Pronamic
 * @author Remco Tolsma
 * @version 1.1.0
 */
class Pronamic_WP_Pay_OmniKassa_LocaleHelper {
	/**
	 * Get OmniKassa locale by the specified WordPress locale
	 *
	 * @return string|null
	 */
	public static function transform( $locale ) {
		// Supported locales
		$supported = array(
			Pronamic_WP_Pay_OmniKassa_Locales::CS,
			Pronamic_WP_Pay_OmniKassa_Locales::CY,
			Pronamic_WP_Pay_OmniKassa_Locales::DE,
			Pronamic_WP_Pay_OmniKassa_Locales::EN,
			Pronamic_WP_Pay_OmniKassa_Locales::ES,
			Pronamic_WP_Pay_OmniKassa_Locales::FR,
			Pronamic_WP_Pay_OmniKassa_Locales::NL,
			Pronamic_WP_Pay_OmniKassa_Locales::SK,
		);

		// Sub string
		$locale = substr( $locale, 0, 2 );

		// Lower case
		$locale = strtolower( $locale );

		// Is supported?
		if ( in_array( $locale, $supported ) ) {
			return $locale;
		}

		// Return
		return null;
	}
}
