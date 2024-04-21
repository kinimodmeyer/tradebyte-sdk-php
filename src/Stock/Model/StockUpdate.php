<?php

declare(strict_types=1);

namespace Tradebyte\Stock\Model;

class StockUpdate
{
    private ?string $articleNumber = null;

    private ?int $stock = null;

    private array $stockForWarehouses = [];

    public function getArticleNumber(): ?string
    {
        return $this->articleNumber;
    }

    public function setArticleNumber(string $articleNumber): StockUpdate
    {
        $this->articleNumber = $articleNumber;
        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): StockUpdate
    {
        $this->stock = $stock;
        return $this;
    }

    public function getStockForWarehouses(): array
    {
        return $this->stockForWarehouses;
    }

    public function addStockForWarehouse(string $warehouseKey, int $stock): StockUpdate
    {
        $this->stockForWarehouses[] = [
            'identifier' => 'key',
            'key' => $warehouseKey,
            'stock' => $stock,
        ];
        return $this;
    }

    public function getRawData(): array
    {
        return [
            'article_number' => $this->getArticleNumber(),
            'stock' => $this->getStock(),
            'stockForWarehouses' => $this->getStockForWarehouses(),
        ];
    }
}
