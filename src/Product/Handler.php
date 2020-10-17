<?php
namespace Tradebyte\Product;

use Tradebyte\Client;
use Tradebyte\Product\Model\Product;

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
     * @param int $productId
     * @param int $channelId
     * @return Product
     */
    public function getProduct(int $productId, int $channelId): Product
    {
        $catalog = new Tbcat($this->client, 'products/', ['p_id' => $productId, 'channel' => $channelId]);
        $productIterator = $catalog->getProducts();
        $productIterator->rewind();

        return $productIterator->current();
    }

    /**
     * @param string $filePath
     * @return Product
     */
    public function getProductLocal(string $filePath): Product
    {
        $catalog = new Tbcat($this->client, $filePath, [], true);
        $productIterator = $catalog->getProducts();
        $productIterator->rewind();

        return $productIterator->current();
    }

    /**
     * @param string $filePath
     * @param int $productId
     * @param int $channelId
     * @return bool
     */
    public function downloadProduct(string $filePath, int $productId, int $channelId): bool
    {
        return $this->client->getRestClient()->downloadFile(
            $filePath, 'products/', ['p_id' => $productId, 'channel' => $channelId]
        );
    }

    /**
     * @param mixed[] $filter
     * @return Tbcat
     */
    public function getTbcat($filter = []): Tbcat
    {
        return new Tbcat($this->client, 'products/', $filter);
    }

    /**
     * @param string $filePath
     * @return Tbcat
     */
    public function getTbcatLocal(string $filePath): Tbcat
    {
        return new Tbcat($this->client, $filePath, [], true);
    }

    /**
     * @param string $filePath
     * @param array $filter
     * @return bool
     */
    public function downloadTbcat(string $filePath, array $filter = []): bool
    {
        return $this->client->getRestClient()->downloadFile($filePath, 'products/', $filter);
    }
}
