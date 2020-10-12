# Tradebyte SDK

## Features

* the library is build that way that it will not consume much memory. that means you could even process gigabyte of data.
* the following data end-points are implemented
  * order(s) fetching

## Requirements

* credentials see https://tb-io.tradebyte.org/how-to/generate-rest-api-credentials-in-tb-one/
* PHP >= 7.3

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
