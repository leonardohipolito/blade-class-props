<?php

namespace LeonardoHipolito\BladeClassProps\Macros;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\View;
use Illuminate\Support\HtmlString;
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
            return (new class implements Htmlable
            {
                public ComponentAttributeBag $attributes;
                public array $cases = [];
                public array $classes = [];
                public $default;
                public function __invoke(
                    ComponentAttributeBag $attributes,
                    $cases,
                    $default = null,
                ) {
                    $this->cases = Arr::wrap($cases);
                    $this->default = $default;
                    $this->attributes = $attributes;
                    if ($attributes->has('class')) {
                        $this->classes[] = $attributes->get('class');
                    }
                    $this->classProps($cases, $default);
                    return $this;
                }
                public function classProps($cases, $default = null)
                {
                    $this->cases = collect(Arr::wrap($cases))->toArray();
                    $this->default = $default;
                    return $this->toCssClasses();
                }

                public function toCssClasses()
                {
                    $classList = Arr::wrap($this->cases);
                    foreach ($classList as $class => $constraint) {
                        if (is_numeric($class)) {
                            $this->classes[] = $constraint;
                        }
                    }

                    $css = collect($this->cases)
                        ->first(fn ($css, $key) => $this->attributes->has($key));
                    if (is_callable($css)) {
                        $css = $css($this->attributes);
                    }
                    $this->classes[] = $css ?? ($this->default ? $this->cases[$this->default] : null);
                    return $this;
                }

                public function __toString()
                {
                    $classes = implode(' ', $this->classes);
                    return "class=\"$classes\"";
                }

                /**
                 * Get content as a string of HTML.
                 *
                 * @return string
                 */
                public function toHtml()
                {
                    return (string) $this;
                }
            })($this, $cases, $default);
        };
    }
}
