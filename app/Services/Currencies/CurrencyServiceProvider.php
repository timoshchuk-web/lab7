<?php


namespace App\Services\Currencies;


use App\Services\Currencies\Contracts\CurrencyContract;
use Carbon\Laravel\ServiceProvider;

class CurrencyServiceProvider extends ServiceProvider
{

    public function register()
    {
        parent::register();

        //$this->app->bind(CurrencyContract::class, CbRfCurrencyService::class);
        $this->app->bind(CurrencyContract::class, FixerCurrencyService::class);

    }
}
