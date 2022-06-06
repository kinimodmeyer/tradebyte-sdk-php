<?php

declare(strict_types=1);

namespace Tradebyte\Upload;

use Tradebyte\Client;

class Handler
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function uploadFile(string $filePath, string $fileName): string
    {
        return $this->client->getRestClient()->uploadFile($filePath, 'sync/in/' . $fileName);
    }
}
