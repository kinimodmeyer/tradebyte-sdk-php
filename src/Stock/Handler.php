<?php

namespace Tradebyte\Stock;

use Tradebyte\Client;
use XMLWriter;

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
    public function getStockList($filter = []): Tbstock
    {
        return new Tbstock($this->client, 'stock/', $filter);
    }

    /**
     * @param string $filePath
     * @return Tbstock
     */
    public function getStockListFromFile(string $filePath): Tbstock
    {
        return new Tbstock($this->client, $filePath, [], true);
    }

    /**
     * @param string $filePath
     * @param array  $filter
     * @return boolean
     */
    public function downloadStockList(string $filePath, array $filter = []): bool
    {
        return $this->client->getRestClient()->downloadFile($filePath, 'stock/', $filter);
    }

    /**
     * @param string $filePath
     * @return string
     */
    public function updateStockFromStockList(string $filePath): string
    {
        return $this->client->getRestClient()->postXMLFile($filePath, 'articles/stock');
    }

    /**
     * @param Stock[] $stockArray
     * @return string
     */
    public function updateStock(array $stockArray)
    {
        $writer = new XMLWriter();
        $writer->openMemory();
        $writer->startElement('TBCATALOG');
        $writer->startElement('ARTICLEDATA');

        foreach ($stockArray as $stock) {
            $writer->startElement('ARTICLE');
            $writer->writeElement('A_NR', $stock->getArticleNumber());
            $writer->writeElement('A_STOCK', $stock->getStock());
            $writer->endElement();
        }

        $writer->endElement();
        $writer->endElement();

        return $this->client->getRestClient()->postXML('articles/stock', $writer->outputMemory());
    }
}
