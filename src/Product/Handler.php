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
        return new Tbcat\Iterator($this->client, 'tbcat', $filter);
    }

    /**
     * @param array $filter
     * @return Model
     */
    public function getProductBy(array $filter = []): Model
    {
        $iterator = new Tbcat\Iterator($this->client, 'tbcat', $filter);
        $iterator->rewind();

        return $iterator->current();
    }
}
