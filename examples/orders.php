<?php
require __DIR__.'/loader.php';

$client = new Tradebyte\Client(['credentials' => $credentials]);
$orderHandler = $client->getOrderHandler();

/*
 * on the fly mode
 */
$orderList = $orderHandler->getTborderList($filter);

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
$orderHandler->downloadTborderList(__DIR__.'/files/orders.xml', $filter);
$orderList = $orderHandler->getTborderListLocal(__DIR__.'/files/orders.xml');

foreach ($orderList->getOrders() as $order) {
    echo $order->getId();
}

$orderList->close();

/*
if (!empty($filter['channel'])) {
    $orderHandler->updateOrder(
        $filter['channel'],
        (new Tradebyte\Order\Model\Order())
            ->setId('12345')
            ->setChannelSign('test')
    );
}
*/
