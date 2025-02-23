# Tradebyte SDK

An SDK that provides multiple ways to interact with the Tradebyte API. For more information, visit [TB.IO](https://tradebyte.io).

## Features

* **Memory Efficiency:** The SDK is designed to consume minimal memory and can efficiently process large XML files - potentially gigabytes in size - through extensive use of iterators and XML readers.
* **Flexible Processing:** Depending on your needs, you can process data "on the fly" or opt for a "download and re-open" approach.
* **Supported Entities:** The SDK supports several entities with multiple endpoints, including: product, order, message, stock, upload

## Requirements

* Credentials (username, password, account-number)
  * See https://tb-io.tradebyte.org/how-to/generate-rest-api-credentials-in-tb-one/ for details.
* PHP >= 7.4
* Composer
* cURL

## Installation

1. download composer (https://getcomposer.org/download)
2. execute the following:

```bash
$ composer require kinimodmeyer/tradebyte-sdk
```

## Quick Example (message)

```php
//only needed if not already included
require './vendor/autoload.php';

$client = new Tradebyte\Client([
    'credentials' => [
         'account_number' => '',
         'account_user' => '',
         'account_password' => ''
     ]
]);

//different handler can be used here
$messageHandler = $client->getMessageHandler();

//fetch message with message-identifier 5
var_dump($messageHandler->getMessage(5)->getId());

//or download/reopen message
$messageHandler->downloadMessage(__DIR__.'/message_5.xml', 5);
var_dump($messageHandler->getMessageFromFile(__DIR__.'/message_5.xml'));

//see also the other possible methods on the handler for list-handling, acknowledge an many more ...
```

## Example Files

Copy the ``vendor/kinimodmeyer/tradebyte-sdk/examples/`` folder to your project-root.
Rename ``examples/example_credentials.php`` to ``examples/credentials.php`` and replace the credentials.
Execute the examples from the cli:

```bash
$ php examples/products.php channel=1370 id=123
$ php examples/orders.php
$ php examples/messages.php
$ php examples/stock.php channel=1370 delta=123
```

## Tests

Execute the test with the following:

```bash
$ ./vendor/bin/phpunit tests
```

## Code Analysis

Execute the analysis with the following:

```bash
$ ./vendor/bin/phpcs src
$ ./vendor/bin/phpcs tests
```

Fix (if possible) with the following:

```bash
$ ./vendor/bin/phpcbf src
$ ./vendor/bin/phpcbf tests
```
