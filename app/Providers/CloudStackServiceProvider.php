<?php

namespace App\Providers;

use App\CloudStack\Client;
use Illuminate\Support\ServiceProvider;

class CloudStackServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Client::class, function () {
            return new Client(config('services.cloudstack'));
        });
    }

    public function provides()
    {
        return [Client::class];
    }
}
