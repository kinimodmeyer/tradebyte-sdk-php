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
     * @param string $filePath
     * @param array $filter
     * @return bool
     */
    public function downloadProductsBy(string $filePath, array $filter = []): bool
    {
        return $this->client->getRestClient()->downloadFile($filePath, 'products/', $filter);
    }

    /**
     * @param string $filePath
     * @return Tbcat\Iterator
     */
    public function openProductsFile(string $filePath) : Tbcat\Iterator
    {
        $iterator = new Tbcat\Iterator($this->client, $filePath);
        $iterator->setOpenLocalFilepath(true);

        return $iterator;
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

    /**
     * @param string $filePath
     * @return Model\Product
     */
    public function openProductFile(string $filePath) : Model\Product
    {
        $iterator = new Tbcat\Iterator($this->client, $filePath);
        $iterator->setOpenLocalFilepath(true);
        $iterator->rewind();

        return $iterator->current();
    }

    /**
     * @param string $filePath
     * @param int $productId
     * @param int $channelId
     * @return bool
     */
    public function downloadProductById(string $filePath, int $productId, int $channelId): bool
    {
        return $this->client->getRestClient()->downloadFile($filePath, 'products/', ['p_id' => $productId, 'channel' => $channelId]);
    }
}
