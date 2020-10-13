<?php
namespace Tradebyte\Stock;

use Tradebyte\Client;

/**
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
    public function getChannelStockBy(array $where = []): Iterator
    {
        return new Iterator($this->client, 'stock', $where);
    }
}
