<?php


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
it('apply callable property class', function () {
    $view = $this->blade('<x-my-component outline md>Test Component</x-my-component>');
    $view->assertSee('Test Component');
    $view->assertSee('button-md');
    $view->assertSee('bg-transparent');

    $view = $this->blade('<x-my-component outline xs>Test Component</x-my-component>');
    $view->assertSee('Test Component');
    $view->assertSee('button-xs-outline');
    $view->assertSee('bg-transparent');
});
