<?php
namespace Tradebyte\Order\Model;

/**
 * @package Tradebyte
 */
class Item
{
    /**
     * @var int
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
     * @var int
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
     * @return int
     */
    public function getId(): ?int
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
    public function getChannelId(): ?string
    {
        return $this->channelId;
    }

    /**
     * @param string $channelId
     */
    public function setChannelId(string $channelId): void
    {
        $this->channelId = $channelId;
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
     */
    public function setSku(string $sku): void
    {
        $this->sku = $sku;
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
     */
    public function setEan(string $ean): void
    {
        $this->ean = $ean;
    }

    /**
     * @return int
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
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
     */
    public function setTransferPrice(float $transferPrice): void
    {
        $this->transferPrice = $transferPrice;
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
     */
    public function setItemPrice(float $itemPrice): void
    {
        $this->itemPrice = $itemPrice;
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
     */
    public function setCreatedDate(string $createdDate): void
    {
        $this->createdDate = $createdDate;
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
