<?php

namespace LeonardoHipolito\BladeClassProps\Tests\MyComponent;

use Illuminate\Support\ServiceProvider;

class MyComponentServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        config(['view.paths' => [__DIR__ . '/views']]);
    }
}
