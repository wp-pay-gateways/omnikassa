<?php

namespace Pronamic\WordPress\Pay\Gateways\OmniKassa;

use Pronamic\WordPress\Pay\Core\DataHelper as Core_DataHelper;

/**
 * Title: OmniKassa data helper class
 * Description:
 * Copyright: 2005-2019 Pronamic
 * Company: Pronamic
 *
 * @author  Remco Tolsma
 * @version 1.0.0
 */
class DataHelper {
	/**
	 * N - Indicates that a numerical value [0-9] is accepted
	 *
	 * @var array
	 */
	private static $characters_n = array( '0-9' );

	/**
	 * A - Indicates that an alphabetical value [aA-zZ] is accepted
	 *
	 * @var array
	 */
	private static $characters_a = array( 'A-Z', 'a-z' );

	/**
	 * A + N
	 *
	 * @var array
	 */
	private static $characters_an = array( 'A-Z', 'a-z', '0-9' );

	/**
	 * Filter N characters
	 *
	 * @param string $string
	 * @param string $max
	 *
	 * @return string
	 */
	public static function filter_n( $string, $max = null ) {
		return Core_DataHelper::filter( self::$characters_n, $string, $max );
	}

	/**
	 * Filter A characters
	 *
	 * @param string $string
	 * @param string $max
	 *
	 * @return string
	 */
	public static function filter_a( $string, $max = null ) {
		return Core_DataHelper::filter( self::$characters_a, $string, $max );
	}

	/**
	 * Filter A + N characters
	 *
	 * @param string $string
	 * @param string $max
	 *
	 * @return string
	 */
	public static function filter_an( $string, $max = null ) {
		return Core_DataHelper::filter( self::$characters_an, $string, $max );
	}
}
