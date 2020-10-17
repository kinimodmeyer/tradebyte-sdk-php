<?php
namespace Tradebyte\Message\Model;

use SimpleXMLElement;

/**
 * @package Tradebyte
 */
class Message
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var int
     */
    protected $orderId;

    /**
     * @var int
     */
    protected $orderItemId;

    /**
     * @var string
     */
    protected $sku;

    /**
     * @var string
     */
    protected $channelSign;

    /**
     * @var string
     */
    protected $channelOrderId;

    /**
     * @var int
     */
    protected $quantity;

    /**
     * @var string
     */
    protected $carrierParcelType;

    /**
     * @var string
     */
    protected $idcode;

    /**
     * @var bool
     */
    protected $isProcessed;

    /**
     * @var bool
     */
    protected $isExported;

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
     * @return Message
     */
    public function setId(int $id): Message
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Message
     */
    public function setType(string $type): Message
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return int
     */
    public function getOrderId(): ?int
    {
        return $this->orderId;
    }

    /**
     * @param int $orderId
     * @return Message
     */
    public function setOrderId(int $orderId): Message
    {
        $this->orderId = $orderId;
        return $this;
    }

    /**
     * @return int
     */
    public function getOrderItemId(): ?int
    {
        return $this->orderItemId;
    }

    /**
     * @param int $orderItemId
     * @return Message
     */
    public function setOrderItemId(int $orderItemId): Message
    {
        $this->orderItemId = $orderItemId;
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
     * @return Message
     */
    public function setSku(string $sku): Message
    {
        $this->sku = $sku;
        return $this;
    }

    /**
     * @return string
     */
    public function getChannelSign(): ?string
    {
        return $this->channelSign;
    }

    /**
     * @param string $channelSign
     * @return Message
     */
    public function setChannelSign(string $channelSign): Message
    {
        $this->channelSign = $channelSign;
        return $this;
    }

    /**
     * @return string
     */
    public function getChannelOrderId(): ?string
    {
        return $this->channelOrderId;
    }

    /**
     * @param string $channelOrderId
     * @return Message
     */
    public function setChannelOrderId(string $channelOrderId): Message
    {
        $this->channelOrderId = $channelOrderId;
        return $this;
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
     * @return Message
     */
    public function setQuantity(int $quantity): Message
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return string
     */
    public function getCarrierParcelType(): ?string
    {
        return $this->carrierParcelType;
    }

    /**
     * @param string $carrierParcelType
     * @return Message
     */
    public function setCarrierParcelType(string $carrierParcelType): Message
    {
        $this->carrierParcelType = $carrierParcelType;
        return $this;
    }

    /**
     * @return string
     */
    public function getIdcode(): ?string
    {
        return $this->idcode;
    }

    /**
     * @param string $idcode
     * @return Message
     */
    public function setIdcode(string $idcode): Message
    {
        $this->idcode = $idcode;
        return $this;
    }

    /**
     * @return bool
     */
    public function isProcessed(): ?bool
    {
        return $this->isProcessed;
    }

    /**
     * @param bool $isProcessed
     * @return Message
     */
    public function setIsProcessed(bool $isProcessed): Message
    {
        $this->isProcessed = $isProcessed;
        return $this;
    }

    /**
     * @return bool
     */
    public function isExported(): ?bool
    {
        return $this->isExported;
    }

    /**
     * @param bool $isExported
     * @return Message
     */
    public function setIsExported(bool $isExported): Message
    {
        $this->isExported = $isExported;
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
     * @return Message
     */
    public function setCreatedDate(string $createdDate): Message
    {
        $this->createdDate = $createdDate;
        return $this;
    }

    /**
     * @param SimpleXMLElement $xmlElement
     * @return void
     */
    public function fillFromSimpleXMLElement(SimpleXMLElement $xmlElement)
    {
        $this->setId((int)$xmlElement->MESSAGE_ID);
        $this->setType((string)$xmlElement->MESSAGE_TYPE);
        $this->setOrderId((int)$xmlElement->TB_ORDER_ID);
        $this->setOrderItemId((int)$xmlElement->TB_ORDER_ITEM_ID);
        $this->setSku((string)$xmlElement->SKU);
        $this->setChannelSign((string)$xmlElement->CHANNEL_SIGN);
        $this->setChannelOrderId((string)$xmlElement->CHANNEL_ORDER_ID);
        $this->setQuantity((int)$xmlElement->QUANTITY);
        $this->setCarrierParcelType((string)$xmlElement->CARRIER_PARCEL_TYPE);
        $this->setIdcode((string)$xmlElement->IDCODE);
        $this->setIsProcessed((bool)(int)$xmlElement->PROCESSED);
        $this->setIsExported((bool)(int)$xmlElement->EXPORTED);
        $this->setCreatedDate((string)$xmlElement->DATE_CREATED);
    }

    /**
     * @return mixed[]
     */
    public function getRawData()
    {
        return [
            'id' => $this->getId(),
            'type' => $this->getType(),
            'order_id' => $this->getOrderId(),
            'order_item_id' => $this->getOrderItemId(),
            'sku' => $this->getSku(),
            'channel_sign' => $this->getChannelSign(),
            'channel_order_id' => $this->getChannelOrderId(),
            'quantity' => $this->getQuantity(),
            'carrier_parcel_type' => $this->getCarrierParcelType(),
            'idcode' => $this->getIdcode(),
            'is_processed' => $this->isProcessed(),
            'is_exported' => $this->isExported(),
            'created_date' => $this->getCreatedDate(),
        ];
    }
}
