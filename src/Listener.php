<?php

/**
 * Title: OmniKassa listener
 * Description:
 * Copyright: Copyright (c) 2005 - 2017
 * Company: Pronamic
 *
 * @author Remco Tolsma
 * @version 1.2.3
 * @since 1.0.0
 */
class Pronamic_WP_Pay_Gateways_OmniKassa_Listener implements Pronamic_Pay_Gateways_ListenerInterface {
	public static function listen() {
		if (
			filter_has_var( INPUT_POST, 'Data' )
				&&
			filter_has_var( INPUT_POST, 'Seal' )
		) {
			$input_data = filter_input( INPUT_POST, 'Data' );

			$data = Pronamic_WP_Pay_Gateways_OmniKassa_Client::parse_piped_string( $input_data );

			$transaction_reference = $data['transactionReference'];

			$payment = get_pronamic_payment_by_meta( '_pronamic_payment_omnikassa_transaction_reference', $transaction_reference );

			Pronamic_WP_Pay_Plugin::update_payment( $payment );
		}
	}
}
