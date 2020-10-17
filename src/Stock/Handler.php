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
     * @param mixed[] $filter
     * @return Tbstock
     */
    public function getTbstock($filter = []): Tbstock
    {
        return new Tbstock($this->client, 'stock/', $filter);
    }

    /**
     * @param string $filePath
     * @return Tbstock
     */
    public function getTbstockLocal(string $filePath): Tbstock
    {
        return new Tbstock($this->client, $filePath, [], true);
    }

    /**
     * @param string $filePath
     * @param array $filter
     * @return bool
     */
    public function downloadTbstock(string $filePath, array $filter = []): bool
    {
        return $this->client->getRestClient()->downloadFile($filePath, 'stock/', $filter);
    }
}
