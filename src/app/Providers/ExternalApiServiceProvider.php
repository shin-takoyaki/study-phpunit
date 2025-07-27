<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\External\ExternalApiInterface;
use App\External\ApiClient;
use App\External\FakeApiClient;

class ExternalApiServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ExternalApiInterface::class, function ($app) {
            return app()->environment('testing')
                ? new FakeApiClient()
                : new ApiClient();
        });
    }
}
