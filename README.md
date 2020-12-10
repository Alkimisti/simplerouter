# Simple Router

This package is a simple PSR-4 router for PHP.



## Install

Via Composer

``` bash
$ composer require alkimisti/simplerouter:dev-main
```

## Usage

``` php
$router = new Router();
$router->resolve();
```

The first URL segment will be used as the name of the controller; `/home` will instantiate `App\Controllers\HomeController.php`.

The second URL segment will be used as the name of the action/method; `/home/index` will invoke `index()` method in `App\Controllers\HomeController`.

Other segments will be forwarded as method arguments; `/products/show/5` will invoke `show()` method in `App\Controllers\ProductsController`, passing the number `5` as its first argument.



## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Credits

- [Tahir Hoxha][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
