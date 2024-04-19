<?php

declare(strict_types=1);

namespace Tradebyte\Stock\Model;

use SimpleXMLElement;

class Stock
{
    private ?string $articleNumber = null;

    private ?int $stock = null;

    private array $stockForWarehouses = [];

    public function getArticleNumber(): ?string
    {
        return $this->articleNumber;
    }

    public function setArticleNumber(string $articleNumber): Stock
    {
        $this->articleNumber = $articleNumber;
        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): Stock
    {
        $this->stock = $stock;
        return $this;
    }

    public function getStockForWarehouses(): array
    {
        return $this->stockForWarehouses;
    }

    public function addStockForWarehouse(string $warehouseKey, int $stock): Stock
    {
        $this->stockForWarehouses[] = [
            'identifier' => 'key',
            'key' => $warehouseKey,
            'stock' => $stock,
        ];
        return $this;
    }

    public function fillFromSimpleXMLElement(SimpleXMLElement $xmlElement): void
    {
        $this->setArticleNumber((string)$xmlElement->A_NR);
        $this->setStock((int)$xmlElement->A_STOCK);
    }

    public function getRawData(): array
    {
        return [
            'article_number' => $this->getArticleNumber(),
            'stock' => $this->getStock(),
        ];
    }
}
