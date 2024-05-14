<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;


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
        RateLimiter::for('connexion', function (Request $request) {
            return Limit::perMinute(3)->response(function (){
                return redirect()->route('home')->withErrors('Trop de tentatives veuillez patienter.');
            })->by($request->ip());
        });
    }
}
