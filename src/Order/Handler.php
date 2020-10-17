<?php
namespace Tradebyte\Order;

use Tradebyte\Client;
use Tradebyte\Order\Model\Order;

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
     * @param int $orderId
     * @return Order
     */
    public function getTborder(int $orderId): Order
    {
        $catalog = new Tborderlist($this->client, 'orders/'.(int)$orderId, []);
        $orderIterator = $catalog->getOrders();
        $orderIterator->rewind();

        return $orderIterator->current();
    }

    /**
     * @param string $filePath
     * @return Order
     */
    public function getTborderLocal(string $filePath): Order
    {
        $catalog = new Tborderlist($this->client, $filePath, [], true);
        $orderIterator = $catalog->getOrders();
        $orderIterator->rewind();

        return $orderIterator->current();
    }

    /**
     * @param string $filePath
     * @param int $orderId
     * @return bool
     */
    public function downloadTborder(string $filePath, int $orderId): bool
    {
        return $this->client->getRestClient()->downloadFile($filePath, 'orders/'.(int)$orderId, []);
    }

    /**
     * @param mixed[] $filter
     * @return Tborderlist
     */
    public function getTborderList($filter = []): Tborderlist
    {
        return new Tborderlist($this->client, 'orders/', $filter);
    }

    /**
     * @param string $filePath
     * @return Tborderlist
     */
    public function getTborderListLocal(string $filePath): Tborderlist
    {
        return new Tborderlist($this->client, $filePath, [], true);
    }

    /**
     * @param string $filePath
     * @param array $filter
     * @return bool
     */
    public function downloadTborderList(string $filePath, array $filter = []): bool
    {
        return $this->client->getRestClient()->downloadFile($filePath, 'orders/', $filter);
    }

    /**
     * @param int $orderId
     * @return boolean
     */
    public function updateOrderExported(int $orderId)
    {
        $this->client->getRestClient()->postXML('orders/'.$orderId.'/exported');
        return true;
    }
}
