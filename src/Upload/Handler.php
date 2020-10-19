<?php

namespace Tradebyte\Upload;

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
     * @param string $filePath
     * @param string $fileName
     * @return boolean
     */
    public function uploadFile(string $filePath, string $fileName): bool
    {
        return $this->client->getRestClient()->uploadFile($filePath, 'sync/in/' . $fileName);
    }
}
