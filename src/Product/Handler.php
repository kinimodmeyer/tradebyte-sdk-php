<?php

declare(strict_types=1);

namespace Tradebyte\Product;

use SimpleXMLElement;
use Tradebyte\Client;
use Tradebyte\Product\Model\Product;
use XMLReader;

/**
 * Handles all product data specific task.
 */
class Handler
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getProduct(int $productId, int $channelId): Product
    {
        $catalog = new Tbcat($this->client, 'products/', ['p_id' => $productId, 'channel' => $channelId]);
        $productIterator = $catalog->getProducts();
        $productIterator->rewind();

        return $productIterator->current();
    }

    public function getProductFromFile(string $filePath): Product
    {
        $xmlElement = new SimpleXMLElement(file_get_contents($filePath));
        $model = new Product();
        $model->fillFromSimpleXMLElement($xmlElement);

        return $model;
    }

    public function downloadProduct(string $filePath, int $productId, int $channelId): bool
    {
        $reader = $this->client->getRestClient()->getXML(
            'products/' . (int)$productId,
            ['p_id' => $productId, 'channel' => $channelId]
        );

        while ($reader->read()) {
            if (
                $reader->nodeType == XMLReader::ELEMENT
                && $reader->depth === 2
                && $reader->name == 'PRODUCT'
            ) {
                $filePut = file_put_contents($filePath, $reader->readOuterXml());
                $reader->close();
                return $filePut;
            }
        }

        $reader->close();

        return false;
    }

    public function getCatalog($filter = []): Tbcat
    {
        return new Tbcat($this->client, 'products/', $filter);
    }

    public function getCatalogFromFile(string $filePath): Tbcat
    {
        return new Tbcat($this->client, $filePath, [], true);
    }

    public function downloadCatalog(string $filePath, array $filter = []): bool
    {
        return $this->client->getRestClient()->downloadFile($filePath, 'products/', $filter);
    }
}
