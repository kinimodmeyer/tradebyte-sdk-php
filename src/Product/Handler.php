<?php
namespace Tradebyte\Product;

use Tradebyte\Client;

/**
 * Handles all product data specific task.
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
     * @param array $filter
     * @return Tbcat\Iterator
     */
    public function getProductsBy(array $filter = []): Tbcat\Iterator
    {
        return new Tbcat\Iterator($this->client, 'products/', $filter);
    }

    /**
     * @param int $productId
     * @param int $channelId
     * @return Model\Product
     */
    public function getProductById(int $productId, int $channelId): Model\Product
    {
        $iterator = new Tbcat\Iterator($this->client, 'products/', ['p_id' => $productId, 'channel' => $channelId]);
        $iterator->rewind();

        return $iterator->current();
    }
}
