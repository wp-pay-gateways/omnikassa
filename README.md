# WordPress Pay Gateway: OmniKassa

**OmniKassa driver for the WordPress payment processing library.**

[![Build Status](https://travis-ci.org/wp-pay-gateways/omnikassa.svg?branch=develop)](https://travis-ci.org/wp-pay-gateways/omnikassa)
[![Coverage Status](https://coveralls.io/repos/wp-pay-gateways/omnikassa/badge.svg?branch=master&service=github)](https://coveralls.io/github/wp-pay-gateways/omnikassa?branch=master)
[![Latest Stable Version](https://poser.pugx.org/wp-pay-gateways/omnikassa/v/stable.svg)](https://packagist.org/packages/wp-pay-gateways/omnikassa)
[![Total Downloads](https://poser.pugx.org/wp-pay-gateways/omnikassa/downloads.svg)](https://packagist.org/packages/wp-pay-gateways/omnikassa)
[![Latest Unstable Version](https://poser.pugx.org/wp-pay-gateways/omnikassa/v/unstable.svg)](https://packagist.org/packages/wp-pay-gateways/omnikassa)
[![License](https://poser.pugx.org/wp-pay-gateways/omnikassa/license.svg)](https://packagist.org/packages/wp-pay-gateways/omnikassa)
[![Built with Grunt](https://cdn.gruntjs.com/builtwith.svg)](http://gruntjs.com/)

## Test Account

| Option      | Value                                                               |
| ----------- | ------------------------------------------------------------------- |
| URL         | `https://payment-webinit.simu.omnikassa.rabobank.nl/paymentServlet` |
| Merchant ID | `002020000000001`                                                   |
| Secret Key  | `002020000000001_KEY1`                                              |
| Key Version | `1`                                                                 |

## WP-CLI

### Create test config

```bash
POST_ID=`wp post create --post_type=pronamic_gateway --post_title='OmniKassa - Test' --post_status=publish --porcelain`
wp post meta update $POST_ID '_pronamic_gateway_id' 'rabobank-omnikassa'
wp post meta update $POST_ID '_pronamic_gateway_mode' 'test'
wp post meta update $POST_ID '_pronamic_gateway_omnikassa_merchant_id' '002020000000001'
wp post meta update $POST_ID '_pronamic_gateway_omnikassa_secret_key' '002020000000001_KEY1'
wp post meta update $POST_ID '_pronamic_gateway_omnikassa_key_version' '1'
```

## Filters

### Filter `pronamic_pay_omnikassa_payment_mean_brand_list`

With the `pronamic_pay_omnikassa_payment_mean_brand_list` filter you adjust the OmniKassa `paymentMeanBrandList` parameter.

Example:

```php
function custom_omnikassa_payment_mean_brand_list( $list ) {
	$list = array(
		'IDEAL',
	);

	return $list;
}

add_filter( 'pronamic_pay_omnikassa_payment_mean_brand_list', 'custom_omnikassa_payment_mean_brand_list' );
```

## Links

*	https://dashboard.omnikassa.rabobank.nl/
*	https://download.omnikassa.rabobank.nl/

## Production Environment

**Payment Server URL:** https://payment-webinit.omnikassa.rabobank.nl/paymentServlet  

## Test Environment

**Payment Server URL:** https://payment-webinit.simu.omnikassa.rabobank.nl/paymentServlet  

## Documentation

[doc-en-sep-2016]: https://www.pronamic.nl/wp-content/uploads/2017/02/actueel-integratiehandleiding-rabo-omnikassa-en-version-7-3-december-2016_29717880.pdf
[doc-nl-sep-2016]: https://www.pronamic.nl/wp-content/uploads/2017/02/actueel-integratiehandleiding-rabo-omnikassa-nl-versie-7-3-december-2016_29717875.pdf
[doc-en-sep-2014]: https://www.pronamic.nl/wp-content/uploads/2016/06/integrationguide_29717880.pdf
[doc-nl-sep-2014]: https://www.pronamic.nl/wp-content/uploads/2016/06/integratiehandleiding_29717875.pdf
[doc-en-apr-2014]: https://www.pronamic.nl/wp-content/uploads/2014/07/integratiehandleiding_rabo_omnikassa_en_version_7_1_april_2014_final_2_0_29637101.pdf
[doc-nl-apr-2014]: https://www.pronamic.nl/wp-content/uploads/2014/07/integratiehandleiding_nl_12_2013_29420242.pdf

| Title                                                       | Language | Version | Date    |
| ----------------------------------------------------------- | -------- | ------- | ------- |
| [Integration Guide Rabo OmniKassa][doc-en-sep-2016]         | EN       | `7.3`   | 2016-12 |
| [Integratiehandleiding Rabo OmniKassa][doc-nl-sep-2016]     | NL       | `7.3`   | 2016-12 |
| ~~[Integration Guide Rabo OmniKassa][doc-en-sep-2014]~~     | EN       | `7.2`   | 2014-09 |
| ~~[Integratiehandleiding Rabo OmniKassa][doc-nl-sep-2014]~~ | NL       | `7.2`   | 2014-09 |
| ~~[Integration Guide Rabo OmniKassa][doc-en-apr-2014]~~     | EN       | `7.1`   | 2014-04 |
| ~~[Integratiehandleiding Rabo OmniKassa][doc-nl-apr-2014]~~ | NL       | `7.1`   | 2014-04 |
