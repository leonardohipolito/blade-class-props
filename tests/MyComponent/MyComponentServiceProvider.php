<?php

namespace LeonardoHipolito\BladeClassProps\Tests\MyComponent;

use Illuminate\Support\ServiceProvider;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class MyComponentServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        config(['view.paths' => [__DIR__ . '/views']]);
    }
}
