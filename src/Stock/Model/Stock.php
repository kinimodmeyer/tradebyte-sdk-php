<?php

namespace Tradebyte\Stock\Model;

use SimpleXMLElement;

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
     * @var integer
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
     * @return Stock
     */
    public function setArticleNumber(string $articleNumber): Stock
    {
        $this->articleNumber = $articleNumber;
        return $this;
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
     * @return Stock
     */
    public function setStock(int $stock): Stock
    {
        $this->stock = $stock;
        return $this;
    }

    /**
     * @param SimpleXMLElement $xmlElement
     */
    public function fillFromSimpleXMLElement(SimpleXMLElement $xmlElement): void
    {
        $this->setArticleNumber((string)$xmlElement->A_NR);
        $this->setStock((int)$xmlElement->A_STOCK);
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
