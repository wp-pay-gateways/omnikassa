<?php

/**
 * Title: OmniKassa data helper class
 * Description:
 * Copyright: Copyright (c) 2005 - 2014
 * Company: Pronamic
 * @author Remco Tolsma
 * @version 1.0.0
 */
class Pronamic_WP_Pay_Gateways_OmniKassa_DataHelper {
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

	//////////////////////////////////////////////////

	/**
 	 * Alphanumerical, free text
 	 *
 	 * @param string $string
 	 * @param string $max
 	 * @return string
 	 */
	public static function filter_an( $string, $max = null ) {
		return Pronamic_WP_Pay_DataHelper::filter( self::$characters_an, $string, $max );
	}
}
