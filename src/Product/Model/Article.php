<?php

namespace Tradebyte\Product\Model;

/**
 * @package Tradebyte
 */
class Article
{
    /**
     * @var integer
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
     * @var boolean
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
     * @var integer
     */
    protected $stock;

    /**
     * @var integer
     */
    protected $deliveryTime;

    /**
     * @var integer
     */
    protected $replacement;

    /**
     * @var integer
     */
    protected $replacementTime;

    /**
     * @var integer
     */
    protected $orderMin;

    /**
     * @var integer
     */
    protected $orderMax;

    /**
     * @var integer
     */
    protected $orderInterval;

    /**
     * @var array
     */
    protected $supSupplier;

    /**
     * @var array
     */
    protected $variants;

    /**
     * @var array
     */
    protected $prices;

    /**
     * @var array
     */
    protected $parcel;

    /**
     * @var array
     */
    protected $media;

    /**
     * @return integer|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param integer $id
     * @return void
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getNumber(): ?string
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
     * @return int|null
     */
    public function getChangeDate(): ?int
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
     * @return int|null
     */
    public function getCreatedDate(): ?int
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
     * @return boolean|null
     */
    public function isActive(): ?bool
    {
        return $this->isActive;
    }

    /**
     * @param boolean $isActive
     */
    public function setIsActive(bool $isActive): void
    {
        $this->isActive = $isActive;
    }

    /**
     * @return string|null
     */
    public function getEan(): ?string
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
     * @return string|null
     */
    public function getProdNumber(): ?string
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
     * @return string|null
     */
    public function getUnit(): ?string
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
     * @return integer|null
     */
    public function getStock(): ?int
    {
        return $this->stock;
    }

    /**
     * @param integer $stock
     */
    public function setStock(int $stock): void
    {
        $this->stock = $stock;
    }

    /**
     * @return integer|null
     */
    public function getDeliveryTime(): ?int
    {
        return $this->deliveryTime;
    }

    /**
     * @param integer $deliveryTime
     */
    public function setDeliveryTime(int $deliveryTime): void
    {
        $this->deliveryTime = $deliveryTime;
    }

    /**
     * @return integer|null
     */
    public function getReplacement(): ?int
    {
        return $this->replacement;
    }

    /**
     * @param integer $replacement
     */
    public function setReplacement(int $replacement): void
    {
        $this->replacement = $replacement;
    }

    /**
     * @return integer|null
     */
    public function getReplacementTime(): ?int
    {
        return $this->replacementTime;
    }

    /**
     * @param integer $replacementTime
     */
    public function setReplacementTime(int $replacementTime): void
    {
        $this->replacementTime = $replacementTime;
    }

    /**
     * @return integer|null
     */
    public function getOrderMin(): ?int
    {
        return $this->orderMin;
    }

    /**
     * @param integer $orderMin
     */
    public function setOrderMin(int $orderMin): void
    {
        $this->orderMin = $orderMin;
    }

    /**
     * @return integer|null
     */
    public function getOrderMax(): ?int
    {
        return $this->orderMax;
    }

    /**
     * @param integer $orderMax
     */
    public function setOrderMax(int $orderMax): void
    {
        $this->orderMax = $orderMax;
    }

    /**
     * @return integer|null
     */
    public function getOrderInterval(): ?int
    {
        return $this->orderInterval;
    }

    /**
     * @param integer $orderInterval
     */
    public function setOrderInterval(int $orderInterval): void
    {
        $this->orderInterval = $orderInterval;
    }

    /**
     * @return array|null
     */
    public function getSupSupplier(): ?array
    {
        return $this->supSupplier;
    }

    /**
     * @param array $supSupplier
     */
    public function setSupSupplier(array $supSupplier): void
    {
        $this->supSupplier = $supSupplier;
    }

    /**
     * @return array|null
     */
    public function getVariants(): ?array
    {
        return $this->variants;
    }

    /**
     * @param array $variants
     */
    public function setVariants(array $variants): void
    {
        $this->variants = $variants;
    }

    /**
     * @return array|null
     */
    public function getPrices(): ?array
    {
        return $this->prices;
    }

    /**
     * @param array $prices
     */
    public function setPrices(array $prices): void
    {
        $this->prices = $prices;
    }

    /**
     * @return array|null
     */
    public function getParcel(): ?array
    {
        return $this->parcel;
    }

    /**
     * @param array $parcel
     */
    public function setParcel(array $parcel): void
    {
        $this->parcel = $parcel;
    }

    /**
     * @return array|null
     */
    public function getMedia(): ?array
    {
        return $this->media;
    }

    /**
     * @param array $media
     */
    public function setMedia(array $media): void
    {
        $this->media = $media;
    }

    /**
     * @return mixed[]
     */
    public function getRawData(): array
    {
        return [
            'id' => $this->getId(),
            'number' => $this->getNumber(),
            'sup_supplier' => $this->getSupSupplier(),
            'change_date' => $this->getChangeDate(),
            'created_date' => $this->getCreatedDate(),
            'active' => $this->isActive(),
            'ean' => $this->getEan(),
            'prod_number' => $this->getProdNumber(),
            'variants' => $this->getVariants(),
            'prices' => $this->getPrices(),
            'media' => $this->getMedia(),
            'unit' => $this->getUnit(),
            'stock' => $this->getStock(),
            'delivery_time' => $this->getDeliveryTime(),
            'replacement' => $this->getReplacement(),
            'replacement_time' => $this->getReplacementTime(),
            'order_min' => $this->getOrderMin(),
            'order_max' => $this->getOrderMax(),
            'order_interval' => $this->getOrderInterval(),
            'parcel' => $this->getParcel(),
        ];
    }
}
