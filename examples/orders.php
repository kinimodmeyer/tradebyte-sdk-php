<?php
require __DIR__.'/loader.php';

$client = new Tradebyte\Client(['credentials' => $credentials]);

if (!empty($filter['id'])) {
    try {
        $order = $client->getOrderHandler()->getOrderBy(['id' => $filter['id']]);

        echo $order->getId();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
} else {
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
}
