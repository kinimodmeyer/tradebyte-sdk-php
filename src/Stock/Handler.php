<?php

declare(strict_types=1);

namespace Tradebyte\Stock;

use Tradebyte\Client;
use XMLWriter;

class Handler
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getStockList(array $filter = []): Tbstock
    {
        return new Tbstock($this->client, 'stock/', $filter);
    }

    public function getStockListFromFile(string $filePath): Tbstock
    {
        return new Tbstock($this->client, $filePath, [], true);
    }

    public function downloadStockList(string $filePath, array $filter = []): bool
    {
        return $this->client->getRestClient()->downloadFile($filePath, 'stock/', $filter);
    }

    public function updateStockFromStockList(string $filePath): string
    {
        return $this->client->getRestClient()->postXMLFile($filePath, 'articles/stock');
    }

    public function updateStock(array $stockArray): string
    {
        $writer = new XMLWriter();
        $writer->openMemory();
        $writer->startElement('TBCATALOG');
        $writer->startElement('ARTICLEDATA');

        foreach ($stockArray as $stock) {
            $writer->startElement('ARTICLE');
            $writer->writeElement('A_NR', $stock->getArticleNumber());
            $writer->writeElement('A_STOCK', (string) $stock->getStock());
            $writer->endElement();
        }

        $writer->endElement();
        $writer->endElement();

        return $this->client->getRestClient()->postXML('articles/stock', $writer->outputMemory());
    }
}
