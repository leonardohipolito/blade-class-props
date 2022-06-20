<?php

namespace LeonardoHipolito\BladeClassProps\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \LeonardoHipolito\BladeClassProps\BladeClassProps
 */
class BladeClassProps extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'blade-class-props';
    }
}
