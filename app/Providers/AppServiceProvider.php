<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\PriceCalculatorInterface;
use App\Services\DefaultPriceCalculator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PriceCalculatorInterface::class, DefaultPriceCalculator::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
