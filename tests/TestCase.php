<?php

namespace LeonardoHipolito\BladeClassProps\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use LeonardoHipolito\BladeClassProps\BladeClassPropsServiceProvider;
use LeonardoHipolito\BladeClassProps\Tests\MyComponent\MyComponentServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    use InteractsWithViews;

    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'LeonardoHipolito\\BladeClassProps\\Database\\Factories\\' . class_basename($modelName) . 'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            BladeClassPropsServiceProvider::class,
            MyComponentServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_blade-class-props_table.php.stub';
        $migration->up();
        */
    }
}
