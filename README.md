
# easy way to convert blade component properties to classes

[![Latest Version on Packagist](https://img.shields.io/packagist/v/leonardohipolito/blade-class-props.svg?style=flat-square)](https://packagist.org/packages/leonardohipolito/blade-class-props)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/leonardohipolito/blade-class-props/run-tests?label=tests)](https://github.com/leonardohipolito/blade-class-props/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/leonardohipolito/blade-class-props/Check%20&%20fix%20styling?label=code%20style)](https://github.com/leonardohipolito/blade-class-props/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/leonardohipolito/blade-class-props.svg?style=flat-square)](https://packagist.org/packages/leonardohipolito/blade-class-props)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.


## Installation

You can install the package via composer:

```bash
composer require leonardohipolito/blade-class-props
```

## Usage


```php
// .../views/components/button.blade.php

<div {{$attributes->classProps(['lg'=>'class-1 class-2','md'=>'class-3'], 'md')}}>
    {{$slot}}
</div>

//or

<div {{$attributes->classProps(['lg'=>'class-1 class-2','md'=>'class-3'])}}>
    {{$slot}}
</div>
```

now you can use your component:

```php
<x-button lg>Test</x-button>
```

outputs:
```html
<div class="class-1 class-2">
    Test
</div>
```


## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Leonardo Hipolito](https://github.com/leonardohipolito)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
