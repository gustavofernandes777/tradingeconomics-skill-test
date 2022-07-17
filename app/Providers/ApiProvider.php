<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class ApiProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('tradingEconomics', function () {
            return Http::withOptions([
                'verify' => false,
                'base_uri' => 'https://api.tradingeconomics.com/comtrade/'
            ])->withHeaders([
                'Authorization' => 'Bearer',
            ]);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
