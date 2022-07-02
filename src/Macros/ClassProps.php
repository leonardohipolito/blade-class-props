<?php

namespace LeonardoHipolito\BladeClassProps\Macros;

use Illuminate\View\ComponentAttributeBag;

/**
 * @param array $cases
 * @param mixin $default = null
 *
 * @mixin ComponentAttributeBag
 *
 * @return self
 */
class ClassProps
{
    public function __invoke()
    {
        return function (array $cases, $default = null) {
            $css = collect($cases)->first(fn ($css, $key) => $this->has($key));

            return $this->class([$css ?? ($default ? $cases[$default] : null)])
                ->except(array_keys($cases));
        };
    }
}
