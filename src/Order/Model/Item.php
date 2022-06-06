<?php

declare(strict_types=1);

namespace Tradebyte\Order\Model;

class Item
{
    private ?int $id = null;

    private ?string $channelId = null;

    private ?string $sku = null;

    private ?string $channelSku = null;

    private ?string $ean = null;

    private ?int $quantity = null;

    private ?string $billingText = null;

    private ?float $transferPrice = null;

    private ?float $itemPrice = null;

    private ?string $createdDate = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): Item
    {
        $this->id = $id;
        return $this;
    }

    public function getChannelId(): ?string
    {
        return $this->channelId;
    }

    public function setChannelId(string $channelId): Item
    {
        $this->channelId = $channelId;
        return $this;
    }

    public function getSku(): ?string
    {
        return $this->sku;
    }

    public function getChannelSku(): ?string
    {
        return $this->channelSku;
    }

    public function setSku(string $sku): Item
    {
        $this->sku = $sku;
        return $this;
    }

    public function setChannelSku(string $channelSku): Item
    {
        $this->channelSku = $channelSku;
        return $this;
    }

    public function getEan(): ?string
    {
        return $this->ean;
    }

    public function setEan(string $ean): Item
    {
        $this->ean = $ean;
        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): Item
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function getBillingText(): ?string
    {
        return $this->billingText;
    }

    public function setBillingText(string $billingText): Item
    {
        $this->billingText = $billingText;
        return $this;
    }

    public function getTransferPrice(): ?float
    {
        return $this->transferPrice;
    }

    public function setTransferPrice(float $transferPrice): Item
    {
        $this->transferPrice = $transferPrice;
        return $this;
    }

    public function getItemPrice(): ?float
    {
        return $this->itemPrice;
    }

    public function setItemPrice(float $itemPrice): Item
    {
        $this->itemPrice = $itemPrice;
        return $this;
    }

    public function getCreatedDate(): ?string
    {
        return $this->createdDate;
    }

    public function setCreatedDate(string $createdDate): Item
    {
        $this->createdDate = $createdDate;
        return $this;
    }

    public function getRawData(): array
    {
        return [
            'id' => $this->getId(),
            'created_date' => $this->getCreatedDate(),
            'channel_id' => $this->getChannelId(),
            'ean' => $this->getEan(),
            'item_price' => $this->getItemPrice(),
            'quantity' => $this->getQuantity(),
            'billing_text' => $this->getBillingText(),
            'sku' => $this->getSku(),
            'channel_sku' => $this->getChannelSku(),
            'transfer_price' => $this->getTransferPrice(),
        ];
    }
}
