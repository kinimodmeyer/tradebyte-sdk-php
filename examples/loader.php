<?php
require 'vendor/autoload.php';
require 'examples/credentials.php';

$filter = [];
unset($argv[0]);

foreach ($argv as $arg) {
    $e = explode('=', $arg);
    $filter[$e[0]] = $e[1];
}
