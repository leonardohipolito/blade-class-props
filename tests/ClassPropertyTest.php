<?php

use Illuminate\Support\Facades\Blade;

it('apply property class', function () {
    $view = $this->blade('<x-my-component xs>Test</x-my-component>');
    $view->assertSee('Test');
    $view->assertSee('button-xs');
});
it('apply default property class', function () {
    $view = $this->blade('<x-my-component>Test Component</x-my-component>');
    $view->assertSee('Test Component');
    $view->assertSee('button-md');
});
