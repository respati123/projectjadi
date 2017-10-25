[![Travis](https://img.shields.io/travis/geocoder-php/GeocoderLaravel.svg)](https://travis-ci.org/geocoder-php/GeocoderLaravel)
[![Scrutinizer](https://img.shields.io/scrutinizer/g/geocoder-php/GeocoderLaravel.svg)](https://scrutinizer-ci.com/g/geocoder-php/GeocoderLaravel/)
[![Coveralls](https://img.shields.io/coveralls/geocoder-php/GeocoderLaravel.svg)](https://coveralls.io/github/geocoder-php/GeocoderLaravel)
[![GitHub release](https://img.shields.io/github/release/geocoder-php/GeocoderLaravel.svg)](https://github.com/geocoder-php/GeocoderLaravel/releases)
[![Packagist](https://img.shields.io/packagist/dt/toin0u/geocoder-laravel.svg)](https://packagist.org/packages/toin0u/geocoder-laravel)


# Geocoder for Laravel

> If you still use **Laravel 4**, please check out the `0.4.x` branch
 [here](https://github.com/geocoder-php/GeocoderLaravel/tree/0.4.x).

**Version 4.0.0 is a backwards-compatibility-breaking update. Please review
 this documentation, especially the _Usage_ section before installing.**

This package allows you to use [**Geocoder**](http://geocoder-php.org/Geocoder/)
 in [**Laravel 5**](http://laravel.com/).

## Requirements
- PHP >= 7.0.0
- Laravel >= 5.0

## Installation
1. Install the package via composer:
  ```sh
  composer require toin0u/geocoder-laravel
  ```

2. **If you are running Laravel 5.5 (the package will be auto-discovered), skip
  this step.** Find the `providers` array key in `config/app.php` and register
  the **Geocoder Service Provider**:
  ```php
  // 'providers' => [
      Geocoder\Laravel\Providers\GeocoderService::class,
  // ];
  ```

## Upgrading
Anytime you upgrade this package, please remember to clear your cache, to prevent incompatible cached responses when breaking changes are introduced (this should hopefully only be necessary in major versions):
```sh
php artisan cache:clear
```

### 1.x to 4.x
Update your composer.json file:
```json
    "toin0u/geocoder-laravel": "^4.0",
```

The one change to keep in mind here is that the results returned from
 `Geocoder for Laravel` are now using the Laravel-native Collections class
 instead of returning an instance of `AddressCollection`. This should provide
 greater versatility in manipulation of the results, and be inline with
 expectations for working with Laravel. The existing `AddressCollection`
 methods should map strait over to Laravel's `Collection` methods. But be sure
 to double-check your results, if you have been using `count()`,
 `first()`, `isEmpty()`, `slice()`, `has()`, `get()`, or `all()` on your results.

Also, `getProviders()` now returns a Laravel Collection instead of an array.

**Alert:** if you have been using the `getIterator()` method, it is no longer
 needed. Simply iterate over your results as you would any other Laravel
 collection.

**Deprecated:**
  - the `all()` method on the geocoder is being deprecated in favor of using
    `get()`, which will return a Laravel Collection. You can then run `all()`
    on that. This method will be removed in version 5.0.0.
  - the `getProvider()` method on the geocoder is being deprecated in favor of using
    `getProviders()`, which will return a Laravel Collection. You can then run `first()`
    on that to get the same result. This method will be removed in version 5.0.0.

**Added:** this version introduces a new way to create more complex queries:
  - geocodeQuery()
  - reverseQuery()

 Please see the [Geocoder documentation](https://github.com/geocoder-php/Geocoder)
 for more details.

### 0.x to 1.x
If you are upgrading from a pre-1.x version of this package, please keep the
 following things in mind:

1. Update your composer.json file as follows:

    ```json
    "toin0u/geocoder-laravel": "^1.0",
    ```

2. Remove your `config/geocoder.php` configuration file. (If you need to customize it, follow the configuration instructions below.)
3. Remove any Geocoder alias in the aliases section of your `config/app.php`. (This package auto-registers the aliases.)
4. Update the service provider entry in your `config/app.php` to read:

    ```php
    Geocoder\Laravel\Providers\GeocoderService::class,
    ```

5. If you are using the facade in your code, you have two options:
    1. Replace the facades `Geocoder::` (and remove the corresponding `use` statements) with `app('geocoder')->`.
    2. Update the `use` statements to the following:

        ```php
        use Geocoder\Laravel\Facades\Geocoder;
        ```

6. Update your query statements to use `->get()` (to retrieve a collection of
 GeoCoder objects) or `->all()` (to retrieve an array of arrays), then iterate
 to process each result.

## Configuration
Pay special attention to the language and region values if you are using them.
 For example, the GoogleMaps provider uses TLDs for region values, and the
 following for language values: https://developers.google.com/maps/faq#languagesupport.

Further, a special note on the GoogleMaps provider: if you are using an API key,
 you must also use set HTTPS to true. (Best is to leave it true always, unless
 there is a special requirement not to.)

See the [Geocoder documentation](http://geocoder-php.org/Geocoder/) for a list
 of available adapters and providers.

### Configuration
#### Providers
If you are upgrading and have previously published the geocoder config file, you
 need to add the `cache-duration` variable, otherwise cache will be disabled
 (it will default to a `0` cache duration). The default cache duration provided
 by the config file is `999999999` minutes, essentially forever.

By default, the configuration specifies a Chain provider, containing the
 GoogleMaps provider for addresses as well as reverse lookups with lat/long,
 and the GeoIP provider for IP addresses. The first to return a result
 will be returned, and subsequent providers will not be executed. The default
 config file is kept lean with only those two providers.

However, you are free to add or remove providers as needed, both inside the
 Chain provider, as well as along-side it. The following is an example config
 with additional providers we use for testing:
```php
use Http\Client\Curl\Client;
use Geocoder\Provider\BingMaps\BingMaps;
use Geocoder\Provider\Chain\Chain;
use Geocoder\Provider\FreeGeoIp\FreeGeoIp;
use Geocoder\Provider\GoogleMaps\GoogleMaps;

return [
    'cache-duration' => 999999999,
    'providers' => [
        Chain::class => [
            GoogleMaps::class => [
                'en-US',
                env('GOOGLE_MAPS_API_KEY'),
            ],
            FreeGeoIp::class  => [],
        ],
        BingMaps::class => [
            'en-US',
            env('BING_MAPS_API_KEY'),
        ],
        GoogleMaps::class => [
            'us',
            env('GOOGLE_MAPS_API_KEY'),
        ],
    ],
    'adapter'  => Client::class,
];
```

#### Adapters
By default we provide a CURL adapter to get you running out of the box.
 However, if you have already installed Guzzle or any other PSR-7-compatible
 HTTP adapter, you are encouraged to replace the CURL adapter with it. Please
 see the [Geocoder Documentation](https://github.com/geocoder-php/Geocoder) for
 specific implementation details.

### Customization
If you would like to make changes to the default configuration, publish and
 edit the configuration file:
```sh
php artisan vendor:publish --provider="Geocoder\Laravel\Providers\GeocoderService" --tag="config"
```

## Usage
The service provider initializes the `geocoder` service, accessible via the
 facade `Geocoder::...` or the application helper `app('geocoder')->...`.

### Geocoding Addresses
#### Get Collection of Addresses
```php
app('geocoder')->geocode('Los Angeles, CA')->get();
```

#### Get IP Address Information
```php
app('geocoder')->geocode('8.8.8.8')->get();
```

#### Reverse-Geocoding
```php
app('geocoder')->reverse(43.882587,-103.454067)->get();
```

#### Dumping Results
```php
app('geocoder')->geocode('Los Angeles, CA')->dump('kml');
```

## Changelog
https://github.com/geocoder-php/GeocoderLaravel/blob/master/CHANGELOG.md

## Support
If you are experiencing difficulties, please please open an issue on GitHub:
 https://github.com/geocoder-php/GeocoderLaravel/issues.

## Contributor Code of Conduct
Please note that this project is released with a
 [Contributor Code of Conduct](https://github.com/geocoder-php/Geocoder#contributor-code-of-conduct).
 By participating in this project you agree to abide by its terms.

## License
GeocoderLaravel is released under the MIT License. See the bundled
 [LICENSE](https://github.com/geocoder-php/GeocoderLaravel/blob/master/LICENSE)
 file for details.
