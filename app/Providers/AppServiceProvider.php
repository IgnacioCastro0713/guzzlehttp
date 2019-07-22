<?php

namespace App\Providers;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('GuzzleHttp\Client', function () {
            return new Client([
                'base_uri' => 'http://dummy.restapiexample.com/api/v1/',
                'timeout'  => 2.0,

                'headers' => [
                    'Content-Type' => 'application/json',
                    "Accept" => "application/json",
                    'Authorization' => "Basic " . base64_encode("username:password")
                ],

                'verify' => false
            ]);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
