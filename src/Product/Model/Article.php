<?php
namespace Tradebyte\Product\Model;

/**
 * @package Tradebyte
 */
class Article
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $number;

    /**
     * @var string
     */
    protected $changeDate;

    /**
     * @var string
     */
    protected $createdDate;

    /**
     * @var bool
     */
    protected $isActive;

    /**
     * @var string
     */
    protected $ean;

    /**
     * @var string
     */
    protected $prodNumber;

    /**
     * @var string
     */
    protected $unit;

    /**
     * @var int
     */
    protected $stock;

    /**
     * @var int
     */
    protected $deliveryTime;

    /**
     * @var int
     */
    protected $replacement;

    /**
     * @var int
     */
    protected $replacementTime;

    /**
     * @var int
     */
    protected $orderMin;

    /**
     * @var int
     */
    protected $orderMax;

    /**
     * @var int
     */
    protected $orderInterval;

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
     * @return string
     */
    public function getChangeDate(): string
    {
        return $this->changeDate;
    }

    /**
     * @param string $changeDate
     */
    public function setChangeDate(string $changeDate): void
    {
        $this->changeDate = $changeDate;
    }

    /**
     * @return string
     */
    public function getCreatedDate(): string
    {
        return $this->createdDate;
    }

    /**
     * @param string $createdDate
     */
    public function setCreatedDate(string $createdDate): void
    {
        $this->createdDate = $createdDate;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->isActive;
    }

    /**
     * @param bool $isActive
     */
    public function setIsActive(bool $isActive): void
    {
        $this->isActive = $isActive;
    }

    /**
     * @return string
     */
    public function getEan(): string
    {
        return $this->ean;
    }

    /**
     * @param string $ean
     */
    public function setEan(string $ean): void
    {
        $this->ean = $ean;
    }

    /**
     * @return string
     */
    public function getProdNumber(): string
    {
        return $this->prodNumber;
    }

    /**
     * @param string $prodNumber
     */
    public function setProdNumber(string $prodNumber): void
    {
        $this->prodNumber = $prodNumber;
    }

    /**
     * @return string
     */
    public function getUnit(): string
    {
        return $this->unit;
    }

    /**
     * @param string $unit
     */
    public function setUnit(string $unit): void
    {
        $this->unit = $unit;
    }

    /**
     * @return int
     */
    public function getStock(): int
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
     * @return int
     */
    public function getDeliveryTime(): int
    {
        return $this->deliveryTime;
    }

    /**
     * @param int $deliveryTime
     */
    public function setDeliveryTime(int $deliveryTime): void
    {
        $this->deliveryTime = $deliveryTime;
    }

    /**
     * @return int
     */
    public function getReplacement(): int
    {
        return $this->replacement;
    }

    /**
     * @param int $replacement
     */
    public function setReplacement(int $replacement): void
    {
        $this->replacement = $replacement;
    }

    /**
     * @return int
     */
    public function getReplacementTime(): int
    {
        return $this->replacementTime;
    }

    /**
     * @param int $replacementTime
     */
    public function setReplacementTime(int $replacementTime): void
    {
        $this->replacementTime = $replacementTime;
    }

    /**
     * @return int
     */
    public function getOrderMin(): int
    {
        return $this->orderMin;
    }

    /**
     * @param int $orderMin
     */
    public function setOrderMin(int $orderMin): void
    {
        $this->orderMin = $orderMin;
    }

    /**
     * @return int
     */
    public function getOrderMax(): int
    {
        return $this->orderMax;
    }

    /**
     * @param int $orderMax
     */
    public function setOrderMax(int $orderMax): void
    {
        $this->orderMax = $orderMax;
    }

    /**
     * @return int
     */
    public function getOrderInterval(): int
    {
        return $this->orderInterval;
    }

    /**
     * @param int $orderInterval
     */
    public function setOrderInterval(int $orderInterval): void
    {
        $this->orderInterval = $orderInterval;
    }

    /**
     * @return mixed[]
     */
    public function getRawData(): array
    {
        return [
            'id' => $this->getId(),
            'number' => $this->getNumber(),
            'prod_number' => $this->getProdNumber(),
            'change_date' => $this->getChangeDate(),
            'created_date' => $this->getCreatedDate(),
            'stock' => $this->getStock(),
            'ean' => $this->getEan(),
            'order_max' => $this->getOrderMax(),
            'order_min' => $this->getOrderMin(),
            'order_interval' => $this->getOrderInterval(),
            'delivery_time' => $this->getDeliveryTime(),
            'replacement' => $this->getReplacement(),
            'replacement_time' => $this->getReplacementTime(),
            'unit' => $this->getUnit(),
        ];
    }
}
