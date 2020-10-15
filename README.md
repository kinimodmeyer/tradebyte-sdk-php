# Tradebyte SDK

SDK to handle all different ways to interact with Tradebyte API. more infromations you will find on [TB.IO](https://tradebyte.io).

#### !!! this repository is in WIP state !!!

## Features

* the sdk is build that way that it not consume much memory and can even process gigabyte of data. this is done by heavy use of iterators and xml readers.
* depending on the call you can choose between "on the fly" or "download/re-open" mode.
* the following data end-points are implemented:

- [x] order list
- [x] order single
- [x] order ack
- [ ] channel list
- [ ] order push
- [ ] product list
- [ ] product single
- [ ] import push
- [x] stock list
- [ ] stock push
- [ ] stock upload
- [ ] message list
- [ ] message ack

## Requirements

* credentials (username,password,account-number)
  * see https://tb-io.tradebyte.org/how-to/generate-rest-api-credentials-in-tb-one/
* PHP >= 7.3
* Composer

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
$ php examples/orders.php channel=1370 id=123
$ php examples/stock.php channel=1370 delta=123
```
