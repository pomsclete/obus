<?php

namespace App\Providers;

use Input;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('greater_than', function ($attribute, $value, $parameters, $validator) {
            return $value >= $parameters[0];
        });

        Validator::replacer('greater_than', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':other', $parameters[0], ':attribute doit être supérieur à :other');
        });

        Schema::defaultStringLength(191);
    }
}
