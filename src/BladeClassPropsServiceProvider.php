<?php

namespace LeonardoHipolito\BladeClassProps;

use Illuminate\Support\Arr;
use Illuminate\View\ComponentAttributeBag;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class BladeClassPropsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        if (! ComponentAttributeBag::hasMacro('classProps')) {
            ComponentAttributeBag::macro(
                'classProps',
                /**
                 * @param  array<string|int,string>  $cases
                 */
                function (array $cases, string $default = null, string $attribute = null) {
                    /**
                     * @var ComponentAttributeBag $this
                     */
                    $classList = Arr::wrap($cases);
                    $defaultClasses = collect();
                    foreach ($classList as $class => $constraint) {
                        if (is_numeric($class)) {
                            $defaultClasses->push($constraint);
                        }
                    }
                    if ($attribute) {
                        $css = collect($cases)->first(
                            function ($css, $key) use ($attribute) {
                                if ($this->get($attribute) && $this->get($attribute) == $key) {
                                    return true;
                                }

                                return $this->has($key);
                            }
                        );
                    } else {
                        $css = collect($cases)->first(
                            fn ($css, $key) => $this->has($key) && ($this->get($key) !== null ? value($this->get($key)) : true)
                        );
                    }
                    if (is_callable($css)) {
                        $css = $css($this);
                    }

                    return $this
                        ->except(array_keys($cases))
                        ->exceptProps($attribute ? [$attribute] : [])
                        ->merge(['class' => $defaultClasses->join(' ')])
                        ->merge(['class' => $css ?? ($default ? $cases[$default] : null)]);
                }
            );
        }

        $package->name("blade-class-props");
    }
}
