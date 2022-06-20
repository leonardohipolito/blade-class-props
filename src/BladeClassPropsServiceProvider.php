<?php

namespace LeonardoHipolito\BladeClassProps;

use LeonardoHipolito\BladeClassProps\Commands\BladeClassPropsCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class BladeClassPropsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('blade-class-props')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_blade-class-props_table')
            ->hasCommand(BladeClassPropsCommand::class);
    }
}
