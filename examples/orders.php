<?php
require __DIR__.'/loader.php';

$client = new Tradebyte\Client(['credentials' => $credentials]);
$orderHandler = $client->getOrderHandler();
$params = [];

/*
 * on the fly mode
 */
$orderList = $orderHandler->getTborderList($params);

foreach ($orderList->getOrders() as $order) {
    echo $order->getId();

    /*
     * acknowledge order received.
     *
     * try {
     *     $orderHandler->updateOrderExported($order->getId());
     * } catch (Exception $e) {
     *     echo $e->getMessage();
     *  }
     */
}

$orderList->close();

/*
 * download mode
 */
$orderHandler->downloadTborderList(__DIR__.'/files/orders.xml', $params);
$orderList = $orderHandler->getTborderListLocal(__DIR__.'/files/orders.xml');

foreach ($orderList->getOrders() as $order) {
    echo $order->getId();
}

$orderList->close();
