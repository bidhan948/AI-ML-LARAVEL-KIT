<?php

namespace Bidhan\AiMlKit;

use Illuminate\Support\ServiceProvider;

class AiMlKitServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
    }
}
