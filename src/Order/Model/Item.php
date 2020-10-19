<?php

namespace Tradebyte\Order\Model;

/**
 * @package Tradebyte
 */
class Item
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $channelId;

    /**
     * @var string
     */
    protected $sku;

    /**
     * @var string
     */
    protected $ean;

    /**
     * @var integer
     */
    protected $quantity;

    /**
     * @var float
     */
    protected $transferPrice;

    /**
     * @var float
     */
    protected $itemPrice;

    /**
     * @var string
     */
    protected $createdDate;

    /**
     * @return integer
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param integer $id
     * @return Item
     */
    public function setId(int $id): Item
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getChannelId(): ?string
    {
        return $this->channelId;
    }

    /**
     * @param string $channelId
     * @return Item
     */
    public function setChannelId(string $channelId): Item
    {
        $this->channelId = $channelId;
        return $this;
    }

    /**
     * @return string
     */
    public function getSku(): ?string
    {
        return $this->sku;
    }

    /**
     * @param string $sku
     * @return Item
     */
    public function setSku(string $sku): Item
    {
        $this->sku = $sku;
        return $this;
    }

    /**
     * @return string
     */
    public function getEan(): ?string
    {
        return $this->ean;
    }

    /**
     * @param string $ean
     * @return Item
     */
    public function setEan(string $ean): Item
    {
        $this->ean = $ean;
        return $this;
    }

    /**
     * @return integer
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * @param integer $quantity
     * @return Item
     */
    public function setQuantity(int $quantity): Item
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return float
     */
    public function getTransferPrice(): ?float
    {
        return $this->transferPrice;
    }

    /**
     * @param float $transferPrice
     * @return Item
     */
    public function setTransferPrice(float $transferPrice): Item
    {
        $this->transferPrice = $transferPrice;
        return $this;
    }

    /**
     * @return float
     */
    public function getItemPrice(): ?float
    {
        return $this->itemPrice;
    }

    /**
     * @param float $itemPrice
     * @return Item
     */
    public function setItemPrice(float $itemPrice): Item
    {
        $this->itemPrice = $itemPrice;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedDate(): ?string
    {
        return $this->createdDate;
    }

    /**
     * @param string $createdDate
     * @return Item
     */
    public function setCreatedDate(string $createdDate): Item
    {
        $this->createdDate = $createdDate;
        return $this;
    }

    /**
     * @return mixed[]
     */
    public function getRawData(): array
    {
        return [
            'id' => $this->getId(),
            'created_date' => $this->getCreatedDate(),
            'channel_id' => $this->getChannelId(),
            'ean' => $this->getEan(),
            'item_price' => $this->getItemPrice(),
            'quantity' => $this->getQuantity(),
            'sku' => $this->getSku(),
            'transfer_price' => $this->getTransferPrice(),
        ];
    }
}
