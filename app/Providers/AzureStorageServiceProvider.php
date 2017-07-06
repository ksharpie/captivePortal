<?php
namespace App\Providers;

use Storage;
use League\Flysystem\Filesystem;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Azure\AzureAdapter;
use WindowsAzure\Common\ServicesBuilder;

class AzureStorageServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        Storage::extend('azure', function($app, $config) {
            $endpoint = sprintf(
                'DefaultEndpointsProtocol=https;AccountName=merakiwalledgarden2;AccountKey=9pUn+eWrQnFGPTAkXqwRJF8s8Ffj8UtwymVhImZb1+fqOqbmzYS5zlPMJ2FYutPv9shV/fsn9/evm7ZbviIgKw==',
                $config['name'],
                $config['key']
            );
            $blobRestProxy = ServicesBuilder::getInstance()->createBlobService($endpoint);
            return new Filesystem(new AzureAdapter($blobRestProxy, $config['container']));
        });
    }
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
