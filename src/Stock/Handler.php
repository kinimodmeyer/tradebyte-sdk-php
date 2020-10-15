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
     * @param array $filter
     * @return Iterator
     */
    public function getChannelStockBy(array $filter = []): Iterator
    {
        return new Iterator($this->client, 'stock/', $filter);
    }

    /**
     * @param string $filePath
     * @param array $filter
     * @return bool
     */
    public function downloadChannelStockBy(string $filePath, array $filter = []): bool
    {
        return $this->client->getRestClient()->downloadFile($filePath, 'stock/', $filter);
    }

    /**
     * @param string $filePath
     * @return Iterator
     */
    public function openChannelStockFile(string $filePath) : Iterator
    {
        $iterator = new Iterator($this->client, $filePath);
        $iterator->setOpenLocalFilepath(true);

        return $iterator;
    }
}
