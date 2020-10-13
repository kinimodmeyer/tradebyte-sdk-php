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
     * @param array $where
     * @return Orderlist\Iterator
     */
    public function getOrdersBy(array $where = []): Orderlist\Iterator
    {
        return new Orderlist\Iterator($this->client, 'orderlist', $where);
    }
}
