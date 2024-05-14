<?php

namespace Bidhan\AiMlKit;

use Illuminate\Support\ServiceProvider;

class AiMlKitServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/aimlkit.php', 'aimlkit'
        );
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');

        $this->publishes([
            __DIR__ . '/config/aimlkit.php' => config_path('aimlkit.php'),
        ], 'config');
    }
}
