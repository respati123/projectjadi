<?php namespace Geocoder\Laravel\Providers;

/**
 * This file is part of the Geocoder Laravel package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Mike Bronner <hello@genealabs.com>
 * @license    MIT License
 */

use Geocoder\Laravel\Facades\Geocoder;
use Geocoder\Laravel\ProviderAndDumperAggregator;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;
use ReflectionClass;

class GeocoderService extends ServiceProvider
{
    protected $defer = false;

    public function boot()
    {
        $configPath = __DIR__ . '/../../config/geocoder.php';
        $this->publishes([$configPath => config_path('geocoder.php')], 'config');
        $this->mergeConfigFrom($configPath, 'geocoder');
        $this->app->singleton('geocoder', function () {
            return (new ProviderAndDumperAggregator)
                ->registerProvidersFromConfig(collect(config('geocoder.providers')));
        });
    }

    public function register()
    {
        $this->app->alias('Geocoder', Geocoder::class);
    }

    public function provides() : array
    {
        return ['geocoder'];
    }
}
