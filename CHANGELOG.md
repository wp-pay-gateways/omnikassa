# Change Log

All notable changes to this project will be documented in this file.

This projects adheres to [Semantic Versioning](http://semver.org/) and [Keep a CHANGELOG](http://keepachangelog.com/).

## [Unreleased][unreleased]
-

## [1.2.3] - 2017-04-07
- Fixed incorrect seal calculations.

## [1.2.2] - 2017-03-15
- Set payment transaction ID to transaction reference (e.g. for payment notes and merge tags).

## [1.2.1] - 2016-11-16
- Added support for Maestro payment method.
- Default order ID uses payment ID in `format_string()`.

## [1.2.0] - 2016-10-20
- Use the new $payment->format_string() function.
- Added support for new Bancontact constant.

## [1.1.9] - 2016-06-14
- Fixed transaction ID/reference inconsistency.

## [1.1.8] - 2016-06-08
- Simplified the gateay payment start function.

## [1.1.7] - 2016-03-24
- Fixed issue with dynamic order_id.

## [1.1.6] - 2016-03-22
- Added product and dashboard URLs.
- Added advanced 'Order ID' setting.

## [1.1.5] - 2016-03-02
- Added get_settings function.
- Moved get_gateway_class() function to the configuration class.
- Removed get_config_class(), no longer required.
- Convert all OmniKassa response codes to the corresponding WordPress pay status.

## [1.1.4] - 2016-02-01
- Added an gateway settings class.
- Remove discontinued MiniTix gateway.

## [1.1.3] - 2015-10-14
- Add locale helper to prevent sending unsupported language codes.
- Add filter pronamic_pay_omnikassa_payment_mean_brand_list.
- Handle response NUMBER_ATTEMPT_EXCEEDED as failure status.

## [1.1.2] - 2015-03-26
- Return array with output fields instead of HTML.

## [1.1.1] - 2015-03-3
- Changed WordPress pay core library requirment from ~1.0.0 to >=1.0.0.

## [1.1.0] - 2015-02-18
- Add all payment methods to the payment mean brand list of no payment method defined.
- Added support for the iDEAL payment method.
- Added support for the Incasso (Direct Debit) payment method.
- Added an payment mean brand list class.

## 1.0.0 - 2015-01-19
- First release.

[unreleased]: https://github.com/wp-pay-gateways/omnikassa/compare/1.2.3...HEAD
[1.2.3]: https://github.com/wp-pay-gateways/omnikassa/compare/1.2.2...1.2.3
[1.2.2]: https://github.com/wp-pay-gateways/omnikassa/compare/1.2.1...1.2.2
[1.2.1]: https://github.com/wp-pay-gateways/omnikassa/compare/1.2.0...1.2.1
[1.2.0]: https://github.com/wp-pay-gateways/omnikassa/compare/1.1.9...1.2.0
[1.1.9]: https://github.com/wp-pay-gateways/omnikassa/compare/1.1.8...1.1.9
[1.1.8]: https://github.com/wp-pay-gateways/omnikassa/compare/1.1.7...1.1.8
[1.1.7]: https://github.com/wp-pay-gateways/omnikassa/compare/1.1.6...1.1.7
[1.1.6]: https://github.com/wp-pay-gateways/omnikassa/compare/1.1.5...1.1.6
[1.1.5]: https://github.com/wp-pay-gateways/omnikassa/compare/1.1.4...1.1.5
[1.1.4]: https://github.com/wp-pay-gateways/omnikassa/compare/1.1.3...1.1.4
[1.1.3]: https://github.com/wp-pay-gateways/omnikassa/compare/1.1.2...1.1.3
[1.1.2]: https://github.com/wp-pay-gateways/omnikassa/compare/1.1.1...1.1.2
[1.1.1]: https://github.com/wp-pay-gateways/omnikassa/compare/1.1.0...1.1.1
[1.1.0]: https://github.com/wp-pay-gateways/omnikassa/compare/1.0.0...1.1.0
