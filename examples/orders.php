<?php
require 'examples/loader.php';

$client = new Tradebyte\Client(['credentials' => $credentials]);

/*
 * orders
 */
try {
    $iterator = $client->getOrderHandler()->getOrdersBy();

    foreach ($iterator as $order) {
        echo 'order:' . $order->getId();

        foreach ($order->getItems() as $item) {
            echo $item->getEan().',';
        }

        /*
         * or get full raw data with $order->getRawData()
         */
        echo "\n";
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
