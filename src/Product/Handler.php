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
     * @return Iterator
     */
    public function getProductsBy(array $filter = []): Iterator
    {
        return new Iterator($this->client, 'productlist', $filter);
    }

    /**
     * @param array $filter
     * @return Iterator
     */
    public function getProductBy(array $filter = []): Iterator
    {
        return new Iterator($this->client, 'productlist', $filter);
    }
}
