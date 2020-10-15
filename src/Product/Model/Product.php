<?php
namespace Tradebyte\Product\Model;

use SimpleXMLElement;

/**
 * @package Tradebyte
 */
class Product
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $number;

    /**
     * @var int
     */
    private $changeDate;

    /**
     * @var int
     */
    private $createdDate;

    /**
     * @var string
     */
    private $brand;

    /**
     * @var Article[]
     */
    protected $articles;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @param string $number
     */
    public function setNumber(string $number): void
    {
        $this->number = $number;
    }

    /**
     * @return int
     */
    public function getChangeDate(): int
    {
        return $this->changeDate;
    }

    /**
     * @param int $changeDate
     */
    public function setChangeDate(int $changeDate): void
    {
        $this->changeDate = $changeDate;
    }

    /**
     * @return int
     */
    public function getCreatedDate(): int
    {
        return $this->createdDate;
    }

    /**
     * @param int $createdDate
     */
    public function setCreatedDate(int $createdDate): void
    {
        $this->createdDate = $createdDate;
    }

    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     */
    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    /**
     * @return Article[]
     */
    public function getArticles(): array
    {
        return $this->articles;
    }

    /**
     * @param Article[] $articles
     */
    public function setArticles(array $articles): void
    {
        $this->articles = $articles;
    }

    /**
     * @param SimpleXMLElement $xmlElement
     * @return void
     */
    public function fillFromSimpleXMLElement(SimpleXMLElement $xmlElement)
    {
        $this->setId((int)$xmlElement->P_NR);
        $this->setNumber((string)$xmlElement->P_NR_EXTERNAL);
        $this->setChangeDate((int)$xmlElement->P_CHANGEDATE);
        $this->setCreatedDate((int)$xmlElement->P_CREATEDATE);
        $this->setBrand((string)$xmlElement->P_BRAND);

        if (isset($xmlElement->ARTICLEDATA)) {
            foreach ($xmlElement->ARTICLEDATA->ARTICLE as $xmlItem) {
                $article = new Article();
                $article->setId((int)$xmlItem->A_ID);
                $article->setNumber((string)$xmlItem->A_NR);
                $article->setChangeDate((string)$xmlItem->A_CHANGEDATE);
                $article->setCreatedDate((string)$xmlItem->A_CREATEDATE);
                $article->setIsActive((bool)$xmlItem->A_ACTIVE);
                $article->setEan((string)$xmlItem->A_EAN);
                $article->setProdNumber((string)$xmlItem->A_PROD_NR);
                $article->setUnit((string)$xmlItem->A_UNIT);
                $article->setStock((int)$xmlItem->A_STOCK);
                $article->setDeliveryTime((int)$xmlItem->A_DELIVERY_TIME);
                $article->setReplacement((int)$xmlItem->A_REPLACEMENT);
                $article->setReplacementTime((int)$xmlItem->A_REPLACEMENT_TIME);
                $article->setOrderMin((int)$xmlItem->A_ORDER_MIN);
                $article->setOrderMax((int)$xmlItem->A_ORDER_MAX);
                $article->setOrderInterval((int)$xmlItem->A_ORDER_INTERVAL);
                $this->articles[] = $article;
            }
        }
    }

    /**
     * @return mixed[]
     */
    public function getRawData(): array
    {
        $data = [
            'id' => $this->getId(),
            'number' => $this->getNumber(),
            'created_date' => $this->getCreatedDate(),
            'change_date' => $this->getChangeDate(),
            'brand' => $this->getBrand(),
        ];

        foreach ($this->getArticles() as $article) {
            $data['articles'][] = $article->getRawData();
        }

        return $data;
    }
}
