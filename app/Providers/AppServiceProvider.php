<?php

namespace App\Providers;

use App\Models\Apartment;
use App\Wrapper\ApiResponse;
use Laravel\Sanctum\Sanctum;
use App\Models\PersonalAccessToken;
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
        $this->app->bind(ApiResponse::class, function ($app) {
            return new ApiResponse(new Apartment());
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
        // Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
    }
}
