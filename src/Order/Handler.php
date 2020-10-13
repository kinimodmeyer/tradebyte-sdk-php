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
     * @return Iterator
     */
    public function getOrdersBy(array $where = []): Iterator
    {
        return new Iterator($this->client, 'orderlist', $where);
    }
}
