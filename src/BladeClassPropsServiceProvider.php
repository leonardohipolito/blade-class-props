<?php

namespace LeonardoHipolito\BladeClassProps;

use Illuminate\View\ComponentAttributeBag;
use LeonardoHipolito\BladeClassProps\Macros\ClassProps;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class BladeClassPropsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        if (! ComponentAttributeBag::hasMacro('classProps')) {
            ComponentAttributeBag::macro(
                'classProps',
                app(ClassProps::class)()
            );
        }

        $package->name("blade-class-props");
    }
}
