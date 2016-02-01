# WordPress Pay Gateway: OmniKassa

**OmniKassa driver for the WordPress payment processing library.**

[![Build Status](https://travis-ci.org/wp-pay-gateways/omnikassa.svg?branch=develop)](https://travis-ci.org/wp-pay-gateways/omnikassa)
[![Coverage Status](https://coveralls.io/repos/wp-pay-gateways/omnikassa/badge.svg?branch=master&service=github)](https://coveralls.io/github/wp-pay-gateways/omnikassa?branch=master)
[![Latest Stable Version](https://poser.pugx.org/wp-pay-gateways/omnikassa/v/stable.svg)](https://packagist.org/packages/wp-pay-gateways/omnikassa)
[![Total Downloads](https://poser.pugx.org/wp-pay-gateways/omnikassa/downloads.svg)](https://packagist.org/packages/wp-pay-gateways/omnikassa)
[![Latest Unstable Version](https://poser.pugx.org/wp-pay-gateways/omnikassa/v/unstable.svg)](https://packagist.org/packages/wp-pay-gateways/omnikassa)
[![License](https://poser.pugx.org/wp-pay-gateways/omnikassa/license.svg)](https://packagist.org/packages/wp-pay-gateways/omnikassa)
[![Built with Grunt](https://cdn.gruntjs.com/builtwith.png)](http://gruntjs.com/)

## Test Account

| Option      | Value                                                               |
| ----------- | ------------------------------------------------------------------- |
| URL         | `https://payment-webinit.simu.omnikassa.rabobank.nl/paymentServlet` |
| Merchant ID | `002020000000001`                                                   |
| Secret Key  | `002020000000001_KEY1`                                              |
| Key Version | `1`                                                                 |


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

*	[Integration Guide Rabo OmniKassa, Version 7.1, April 2014](http://pronamic.nl/wp-content/uploads/2014/07/integratiehandleiding_rabo_omnikassa_en_version_7_1_april_2014_final_2_0_29637101.pdf)
*	[Integratiehandleiding Rabo OmniKassa, versie 7.1, april 2014](http://pronamic.nl/wp-content/uploads/2014/07/integratiehandleiding_nl_12_2013_29420242.pdf)
