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
    }

    /**
     * @return mixed[]
     */
    public function getRawData()
    {
        return [
            'id' => $this->getId(),
            'number' => $this->getNumber(),
            'created_date' => $this->getCreatedDate(),
            'change_date' => $this->getChangeDate(),
            'brand' => $this->getBrand(),
        ];
    }
}
