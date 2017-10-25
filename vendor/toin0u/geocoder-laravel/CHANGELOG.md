# Geocoder for Laravel Changelog
All notable changes to this project will be documented in this file.
This project adheres to [Semantic Versioning](http://semver.org/).

## [4.0.2] - 2 Sep 2017
### Fixed
- erroneous method `getProvider()` and marked it as deprecated.

## [4.0.1] - 7 Aug 2017
### Fixed
- missing PSR-7 dependency.

## [4.0.0] - 3 Aug 2017
### Added
- Laravel 5.5 package auto-discovery.

### Fixed
- typo which caused cache to be in-effective.

### Changed
- implemented geocoder-php 4.0.0.
- version to 4.0.0 instead of 2.0.0 to maintain major version parity with
 parent package.
- composer dependencies to release versions.
- unit tests to pass.
- updated readme with some clarifying notes. May have to completely rewrite it
 if it ends up being unclear.

## [2.0.0-dev] - 23 Jun 2017
### Fixed
- failing Travis builds due TLS resolution issues by changing to a different
 geocoding provider that was failing said resolution during CURL requests.

### Changed
- build and coverage badges back to Travis and Coveralls

## [2.0.0-dev] - 18 Jun 2017
### Added
- compatibility with Geocoder 4.0-dev.
- caching to `geocodeQuery()` and `reverseQuery()` methods.

### Updated
- the geocoder `all()` method to be deprecated. Use `get()`.

## [1.1.0] - 17 Jun 2017
### Added
- caching functionality for `geocode()` and `reverse()` methods.
- `cache-duration` variable to geocoder config.

## [1.0.2] - 20 Mar 2017
### Added
- unit test for reverse-geocoding.

## [1.0.1] - 30 Jan 2017
### Removed
- minimum Laravel requirement of 5.3 (reverted back to 5.0, just in case it was working for someone, but only Laravel 5.3 and 5.4 are officially supported).

## [1.0.0] - 30 Jan 2017
### Changed
- minimum Laravel requirement to 5.3.

## [1.0.0-RC1] - 13 Oct 2016
### Added
- ability to dump results #16.
- ability to use multiple providers in addition to the chain provider #47.
- more integration tests.
- special aggregator that allows chaining of `geocode()` and other methods.

### Changed
- README documentation.
- to use Geocoder 3.3.x.
- namespace to `Geocoder\Laravel\...`.
- service provider to auto-load the facade.
- config file format.
- geocoding commands necessary to obtain results (must use `->all()`, `->get()`,
 or `->dump()`) after the respective command.
- the service provider architecture.

### Fixed
- MaxMindBinary Provider being instantiated with an Adapter #24.
- GeoIP2 Provider being instantiated with a generic Adapter.

## [0.6.0]
- TBD

## [0.5.0] - 11 Mar 2015
### Added
- code of conduct message.
- Laravel 5 compatibility [BC].

### Updated
- documentation.

## [0.4.1] - 23 Jun 2014
### Fixed
- the way to implode provider's arguments + unit tests.

## [0.4.0] - 13 Apr 2014
### Updated
- to use Geocoder 2.4.x.

## [0.3.0] - 13 Apr 2014
### Added
- support for Provider arguments (backwards-compatibility break).

## [0.2.0] - 16 Nov 2013
### Added
- config file.

### Updated
- to use Geocoder 2.3.x.
- to use singleton instead of share.
- tests.

## [0.1.0] - 16 Sep 2013
### Added
- badges.
- initial package.
