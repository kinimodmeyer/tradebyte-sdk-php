<?php

declare(strict_types=1);

namespace Tradebyte\Product\Model;

class Article
{
    private ?int $id = null;

    private ?string $number = null;

    private ?int $changeDate = null;

    private ?int $createdDate = null;

    private ?bool $isActive = null;

    private ?string $ean = null;

    private ?string $prodNumber = null;

    private ?string $unit = null;

    private ?int $stock = null;

    private ?int $deliveryTime = null;

    private ?int $replacement = null;

    private ?int $replacementTime = null;

    private ?int $orderMin = null;

    private ?int $orderMax = null;

    private ?int $orderInterval = null;

    private ?array $supSupplier = null;

    private ?array $variants = null;

    private ?array $prices = null;

    private ?array $parcel = null;

    private ?array $media = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number): void
    {
        $this->number = $number;
    }

    public function getChangeDate(): ?int
    {
        return $this->changeDate;
    }

    public function setChangeDate(int $changeDate): void
    {
        $this->changeDate = $changeDate;
    }

    public function getCreatedDate(): ?int
    {
        return $this->createdDate;
    }

    public function setCreatedDate(int $createdDate): void
    {
        $this->createdDate = $createdDate;
    }

    public function isActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): void
    {
        $this->isActive = $isActive;
    }

    public function getEan(): ?string
    {
        return $this->ean;
    }

    public function setEan(string $ean): void
    {
        $this->ean = $ean;
    }

    public function getProdNumber(): ?string
    {
        return $this->prodNumber;
    }

    public function setProdNumber(string $prodNumber): void
    {
        $this->prodNumber = $prodNumber;
    }

    public function getUnit(): ?string
    {
        return $this->unit;
    }

    public function setUnit(string $unit): void
    {
        $this->unit = $unit;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): void
    {
        $this->stock = $stock;
    }

    public function getDeliveryTime(): ?int
    {
        return $this->deliveryTime;
    }

    public function setDeliveryTime(int $deliveryTime): void
    {
        $this->deliveryTime = $deliveryTime;
    }

    public function getReplacement(): ?int
    {
        return $this->replacement;
    }

    public function setReplacement(int $replacement): void
    {
        $this->replacement = $replacement;
    }

    public function getReplacementTime(): ?int
    {
        return $this->replacementTime;
    }

    public function setReplacementTime(int $replacementTime): void
    {
        $this->replacementTime = $replacementTime;
    }

    public function getOrderMin(): ?int
    {
        return $this->orderMin;
    }

    public function setOrderMin(int $orderMin): void
    {
        $this->orderMin = $orderMin;
    }

    public function getOrderMax(): ?int
    {
        return $this->orderMax;
    }

    public function setOrderMax(int $orderMax): void
    {
        $this->orderMax = $orderMax;
    }

    public function getOrderInterval(): ?int
    {
        return $this->orderInterval;
    }

    public function setOrderInterval(int $orderInterval): void
    {
        $this->orderInterval = $orderInterval;
    }

    public function getSupSupplier(): ?array
    {
        return $this->supSupplier;
    }

    public function setSupSupplier(array $supSupplier): void
    {
        $this->supSupplier = $supSupplier;
    }

    public function getVariants(): ?array
    {
        return $this->variants;
    }

    public function setVariants(array $variants): void
    {
        $this->variants = $variants;
    }

    public function getPrices(): ?array
    {
        return $this->prices;
    }

    public function setPrices(array $prices): void
    {
        $this->prices = $prices;
    }

    public function getParcel(): ?array
    {
        return $this->parcel;
    }

    public function setParcel(array $parcel): void
    {
        $this->parcel = $parcel;
    }

    public function getMedia(): ?array
    {
        return $this->media;
    }

    public function setMedia(array $media): void
    {
        $this->media = $media;
    }

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
