<?php

/**
 * Title: OmniKassa listener
 * Description:
 * Copyright: Copyright (c) 2005 - 2011
 * Company: Pronamic
 * @author Remco Tolsma
 * @version 1.0
 */
class Pronamic_WP_Pay_Gateways_OmniKassa_Listener implements Pronamic_Pay_Gateways_ListenerInterface {
	public static function listen() {
		$condition  = true;
		$condition &= filter_has_var( INPUT_POST, 'Data' );
		$condition &= filter_has_var( INPUT_POST, 'Seal' );

		if ( $condition ) {
			$input_data = filter_input( INPUT_POST, 'Data', FILTER_SANITIZE_STRING );

			$data = Pronamic_WP_Pay_Gateways_OmniKassa_Client::parse_piped_string( $input_data );

			$transaction_reference = $data['transactionReference'];

			$payment = get_pronamic_payment_by_transaction_id( $transaction_reference );

			Pronamic_WP_Pay_Plugin::update_payment( $payment );
		}
	}
}
