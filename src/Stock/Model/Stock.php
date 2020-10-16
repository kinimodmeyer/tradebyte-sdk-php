<?php
namespace Tradebyte\Stock\Model;

/**
 * @package Tradebyte
 */
class Stock
{
    /**
     * @var string
     */
    protected $articleNumber;

    /**
     * @var int
     */
    protected $stock;

    /**
     * @return string
     */
    public function getArticleNumber(): ?string
    {
        return $this->articleNumber;
    }

    /**
     * @param string $articleNumber
     */
    public function setArticleNumber(string $articleNumber): void
    {
        $this->articleNumber = $articleNumber;
    }

    /**
     * @return int
     */
    public function getStock(): ?int
    {
        return $this->stock;
    }

    /**
     * @param int $stock
     */
    public function setStock(int $stock): void
    {
        $this->stock = $stock;
    }

    /**
     * @return mixed[]
     */
    public function getRawData()
    {
        return [
            'article_number' => $this->getArticleNumber(),
            'stock' => $this->getStock(),
        ];
    }
}
