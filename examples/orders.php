<?php
require 'examples/loader.php';

$client = new Tradebyte\Client(['credentials' => $credentials]);

/*
 * orders
 */
try {
    $iterator = $client->getOrderHandler()->getOrdersBy();

    foreach ($iterator as $order) {
        var_dump($order->getId());
    }
} catch (Exception $e) {
    var_dump($e->getMessage());
}
