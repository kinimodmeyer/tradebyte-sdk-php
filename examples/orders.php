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

        /*
         * on the fly mode
         */
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

        /*
         * download mode
         */
        $orderHandler->downloadOrdersBy(__DIR__.'/files/order.xml');

        foreach ($orderHandler->openOrderFile(__DIR__.'/files/order.xml') as $order) {
            echo $order->getId()."\n";
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
