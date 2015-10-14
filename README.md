# WordPress Pay Gateway: OmniKassa

**OmniKassa driver for the WordPress payment processing library.**

[![Build Status](https://travis-ci.org/wp-pay-gateways/omnikassa.svg?branch=develop)](https://travis-ci.org/wp-pay-gateways/omnikassa)
[![Coverage Status](https://coveralls.io/repos/wp-pay-gateways/omnikassa/badge.png?branch=develop)](https://coveralls.io/r/wp-pay-gateways/omnikassa?branch=develop)
[![Latest Stable Version](https://poser.pugx.org/wp-pay-gateways/omnikassa/v/stable.svg)](https://packagist.org/packages/wp-pay-gateways/omnikassa)
[![Total Downloads](https://poser.pugx.org/wp-pay-gateways/omnikassa/downloads.svg)](https://packagist.org/packages/wp-pay-gateways/omnikassa)
[![Latest Unstable Version](https://poser.pugx.org/wp-pay-gateways/omnikassa/v/unstable.svg)](https://packagist.org/packages/wp-pay-gateways/omnikassa)
[![License](https://poser.pugx.org/wp-pay-gateways/omnikassa/license.svg)](https://packagist.org/packages/wp-pay-gateways/omnikassa)
[![Built with Grunt](https://cdn.gruntjs.com/builtwith.png)](http://gruntjs.com/)

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

## Documentation

*	[Integration Guide Rabo OmniKassa, Version 7.1, April 2014](http://pronamic.nl/wp-content/uploads/2014/07/integratiehandleiding_rabo_omnikassa_en_version_7_1_april_2014_final_2_0_29637101.pdf)
*	[Integratiehandleiding Rabo OmniKassa, versie 7.1, april 2014](http://pronamic.nl/wp-content/uploads/2014/07/integratiehandleiding_nl_12_2013_29420242.pdf)
