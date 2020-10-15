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
     * @param string $filePath
     * @param array $params
     * @return bool
     */
    public function downloadOrdersBy(string $filePath, array $params = []): bool
    {
        return $this->client->getRestClient()->downloadFile($filePath, 'orders/', $params);
    }

    /**
     * @param string $filePath
     * @return Orderlist\Iterator
     */
    public function openOrdersFile(string $filePath) : Orderlist\Iterator
    {
        $iterator = new Orderlist\Iterator($this->client, $filePath);
        $iterator->setOpenLocalFilepath(true);

        return $iterator;
    }

    /**
     * @param string $filePath
     * @return Model\Order
     */
    public function openOrderFile(string $filePath) : Model\Order
    {
        $iterator = new Orderlist\Iterator($this->client, $filePath);
        $iterator->setOpenLocalFilepath(true);
        $iterator->rewind();

        return $iterator->current();
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
     * @param string $filePath
     * @param int $orderId
     * @return bool
     */
    public function downloadOrderById(string $filePath, int $orderId): bool
    {
        return $this->client->getRestClient()->downloadFile($filePath, 'orders/'.$orderId);
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
