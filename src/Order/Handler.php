<?php
namespace Tradebyte\Order;

use Tradebyte\Client;

/**
 * Handles all order data specific task.
 *
 * @package Tradebyte
 */
class Handler
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $params
     * @return Orderlist\Iterator
     */
    public function getOrdersBy(array $params = []): Orderlist\Iterator
    {
        return new Orderlist\Iterator($this->client, 'orders/', $params);
    }

    /**
     * @param int $orderId
     * @return Model\Order
     */
    public function getOrderById(int $orderId): Model\Order
    {
        $iterator = new Orderlist\Iterator($this->client, 'orders/'.$orderId);
        $iterator->rewind();

        return $iterator->current();
    }

    /**
     * @param int $orderId
     * @return string
     */
    public function updateOrderExported(int $orderId)
    {
        return $this->client->getRestClient()->postXML('orders/'.$orderId.'/exported');
    }
}
