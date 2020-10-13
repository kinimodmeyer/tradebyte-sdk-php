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

    /**
     * @param array $filter
     * @return Model\Order
     */
    public function getOrderBy(array $filter = []): Model\Order
    {
        if (!empty($filter['id'])) {
            $filter['extra'] = $filter['id'];
            unset($filter['id']);
        }

        $iterator = new Orderlist\Iterator($this->client, 'orderlist', $filter);
        $iterator->rewind();

        return $iterator->current();
    }
}
