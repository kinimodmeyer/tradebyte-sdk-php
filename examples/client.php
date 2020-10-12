<?php
require 'vendor/autoload.php';

$credentials = [
    'account_number' => '1234',
    'account_user' => 'dom',
    'account_password' => 'xyz'
];

$client = new Tradebyte\Client(
    $credentials
);

#$client->getProductHandler();
