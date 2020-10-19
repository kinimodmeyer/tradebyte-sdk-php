# Tradebyte SDK

SDK to handle all different ways to interact with Tradebyte API. more informations you will find on [TB.IO](https://tradebyte.io).

#### !!! this repository is in WIP state !!!

## Features

* the sdk is build that way that it not consume much memory and can even process gigabyte of data. this is done by heavy use of iterators and xml readers.
* depending on the call you can choose between "on the fly" or "download/re-open" processing.
* the following data end-points are implemented:

- [x] order list
- [x] order single
- [x] order set exported
- [x] order push
- [x] product list
- [x] product single
- [x] stock list
- [x] stock push
- [x] message list
- [x] message single
- [x] message push
- [x] message push file
- [x] message set exported
- [x] import push

## Requirements

* credentials (username,password,account-number)
  * see https://tb-io.tradebyte.org/how-to/generate-rest-api-credentials-in-tb-one/
* PHP >= 7.3
* Composer
* cURL

## Install

1. download composer (https://getcomposer.org/download)
2. execute the following:

```bash
$ composer require kinimodmeyer/tradebyte-sdk:dev-main
```

## Execute Examples

copy ``vendor/kinimodmeyer/tradebyte-sdk/examples/`` folder to your project-root.
rename ``examples/example_credentials.php`` to ``examples/credentials.php`` and replace the credentials.
execute the examples from the cli:

```bash
$ php examples/products.php channel=1370 id=123
$ php examples/orders.php
$ php examples/messages.php
$ php examples/stock.php channel=1370 delta=123
```

## Tests

execute the test with the following:

```bash
$ ./vendor/bin/phpunit tests
```

## Code Analysis

execute the analysis with the following:

```bash
$ ./vendor/bin/phpcs src
```

fix (if possible) with the following:

```bash
$ ./vendor/bin/phpcbf src
```
