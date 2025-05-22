<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;

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
        Http::macro('withAuth', function () {
            $token = session('jwt_token'); // atau simpan token dari login di session

            return Http::withHeaders([
                'authorization' => 'Bearer ' . $token,
            ]);
        });
    }
}
