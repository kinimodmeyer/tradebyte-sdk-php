<?php
require 'vendor/autoload.php';

$options = [
    'credentials' => [
        'account_number' => '1234',
        'account_user' => 'xyz',
        'account_password' => 'xyz'
    ]
];

$client = new Tradebyte\Client(
    $options
);

#$client->getProductHandler();
