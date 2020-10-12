# Tradebyte SDK

## Features

* the sdk is build that way that it will not consume much memory, no matter if you export small order data or giant product-data.
* the sdk offers mostly two modes: fetching & processing the data on the fly or download the data and processing it later.
* the following data end-points are implemented
  * order(s) fetching

## Requirements

* credentials (username,password,account number)
  * see https://tb-io.tradebyte.org/how-to/generate-rest-api-credentials-in-tb-one/
* PHP >= 7.3
* Composer

## Install

1. get composer via https://getcomposer.org/download
2. clone this repository
3. execute the following:

```bash
$ composer install
```

## Execute Examples

you can execute the examples on the cli.

```bash
$ php examples/client.php
```

it can also be used with a webserver but normally that´s not how you process bigger data.
