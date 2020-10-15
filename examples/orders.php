<?php
require __DIR__.'/loader.php';

$client = new Tradebyte\Client(['credentials' => $credentials]);

if (!empty($filter['id'])) {
    try {
        $order = $client->getOrderHandler()->getOrderById($filter['id']);

        echo $order->getId();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
} else {
    try {
        $orderHandler = $client->getOrderHandler();

        foreach ($orderHandler->getOrdersBy() as $order) {
            echo 'order:' . $order->getId();

            foreach ($order->getItems() as $item) {
                echo $item->getEan().',';
            }

            /*
             * acknowledge order received.
             *
             * try {
             *     $orderHandler->updateOrderExported($order->getId());
             * } catch (Exception $e) {
             *     echo $e->getMessage();
             *  }
             */

            echo "\n";
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
