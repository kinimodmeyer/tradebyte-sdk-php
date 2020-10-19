<?php

namespace Tradebyte\Message\Model;

use SimpleXMLElement;

/**
 * @package Tradebyte
 */
class Message
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var integer
     */
    protected $orderId;

    /**
     * @var integer
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
     * @var string
     */
    protected $channelOrderItemId;

    /**
     * @var string
     */
    protected $channelSku;

    /**
     * @var integer
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
     * @var string
     */
    protected $idcodeReturnProposal;

    /**
     * @var string
     */
    protected $deduction;

    /**
     * @var string
     */
    protected $comment;

    /**
     * @var string
     */
    protected $returnCause;

    /**
     * @var string
     */
    protected $returnState;

    /**
     * @var string
     */
    protected $service;

    /**
     * @var string
     */
    protected $estShipDate;

    /**
     * @var boolean
     */
    protected $isProcessed;

    /**
     * @var boolean
     */
    protected $isExported;

    /**
     * @var string
     */
    protected $createdDate;

    /**
     * @var string
     */
    protected $deliveryInformation;

    /**
     * @return integer
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param integer $id
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
     * @return integer
     */
    public function getOrderId(): ?int
    {
        return $this->orderId;
    }

    /**
     * @param integer $orderId
     * @return Message
     */
    public function setOrderId(int $orderId): Message
    {
        $this->orderId = $orderId;
        return $this;
    }

    /**
     * @return integer
     */
    public function getOrderItemId(): ?int
    {
        return $this->orderItemId;
    }

    /**
     * @param integer $orderItemId
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
     * @return integer
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * @param integer $quantity
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
     * @return boolean
     */
    public function isProcessed(): ?bool
    {
        return $this->isProcessed;
    }

    /**
     * @param boolean $isProcessed
     * @return Message
     */
    public function setIsProcessed(bool $isProcessed): Message
    {
        $this->isProcessed = $isProcessed;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isExported(): ?bool
    {
        return $this->isExported;
    }

    /**
     * @param boolean $isExported
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
     * @return string
     */
    public function getChannelOrderItemId(): ?string
    {
        return $this->channelOrderItemId;
    }

    /**
     * @param string $channelOrderItemId
     * @return Message
     */
    public function setChannelOrderItemId(string $channelOrderItemId): Message
    {
        $this->channelOrderItemId = $channelOrderItemId;
        return $this;
    }

    /**
     * @return string
     */
    public function getChannelSku(): ?string
    {
        return $this->channelSku;
    }

    /**
     * @param string $channelSku
     * @return Message
     */
    public function setChannelSku(string $channelSku): Message
    {
        $this->channelSku = $channelSku;
        return $this;
    }

    /**
     * @return string
     */
    public function getIdcodeReturnProposal(): ?string
    {
        return $this->idcodeReturnProposal;
    }

    /**
     * @param string $idcodeReturnProposal
     * @return Message
     */
    public function setIdcodeReturnProposal(string $idcodeReturnProposal): Message
    {
        $this->idcodeReturnProposal = $idcodeReturnProposal;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeduction(): ?string
    {
        return $this->deduction;
    }

    /**
     * @param string $deduction
     * @return Message
     */
    public function setDeduction(string $deduction): Message
    {
        $this->deduction = $deduction;
        return $this;
    }

    /**
     * @return string
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     * @return Message
     */
    public function setComment(string $comment): Message
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * @return string
     */
    public function getReturnCause(): ?string
    {
        return $this->returnCause;
    }

    /**
     * @param string $returnCause
     * @return Message
     */
    public function setReturnCause(string $returnCause): Message
    {
        $this->returnCause = $returnCause;
        return $this;
    }

    /**
     * @return string
     */
    public function getReturnState(): ?string
    {
        return $this->returnState;
    }

    /**
     * @param string $returnState
     * @return Message
     */
    public function setReturnState(string $returnState): Message
    {
        $this->returnState = $returnState;
        return $this;
    }

    /**
     * @return string
     */
    public function getService(): ?string
    {
        return $this->service;
    }

    /**
     * @param string $service
     * @return Message
     */
    public function setService(string $service): Message
    {
        $this->service = $service;
        return $this;
    }

    /**
     * @return string
     */
    public function getEstShipDate(): ?string
    {
        return $this->estShipDate;
    }

    /**
     * @param string $estShipDate
     * @return Message
     */
    public function setEstShipDate(string $estShipDate): Message
    {
        $this->estShipDate = $estShipDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryInformation(): ?string
    {
        return $this->deliveryInformation;
    }

    /**
     * @param string $deliveryInformation
     * @return Message
     */
    public function setDeliveryInformation(string $deliveryInformation): Message
    {
        $this->deliveryInformation = $deliveryInformation;
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
        $this->setChannelOrderItemId((string)$xmlElement->CHANNEL_ORDER_ITEM_ID);
        $this->setChannelSku((string)$xmlElement->CHANNEL_SKU);
        $this->setQuantity((int)$xmlElement->QUANTITY);
        $this->setCarrierParcelType((string)$xmlElement->CARRIER_PARCEL_TYPE);
        $this->setIdcode((string)$xmlElement->IDCODE);
        $this->setIdcodeReturnProposal((string)$xmlElement->IDCODE_RETURN_PROPOSAL);
        $this->setDeduction((string)$xmlElement->DEDUCTION);
        $this->setComment((string)$xmlElement->COMMENT);
        $this->setReturnCause((string)$xmlElement->RETURN_CAUSE);
        $this->setReturnState((string)$xmlElement->RETURN_STATE);
        $this->setService((string)$xmlElement->SERVICE);
        $this->setEstShipDate((string)$xmlElement->EST_SHIP_DATE);
        $this->setIsProcessed((bool)(int)$xmlElement->PROCESSED);
        $this->setIsExported((bool)(int)$xmlElement->EXPORTED);
        $this->setCreatedDate((string)$xmlElement->DATE_CREATED);
        $this->setDeliveryInformation((string)$xmlElement->DELIVERY_INFORMATION);
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
            'channel_order_item_id' => $this->getChannelOrderItemId(),
            'channel_sku' => $this->getChannelSku(),
            'quantity' => $this->getQuantity(),
            'carrier_parcel_type' => $this->getCarrierParcelType(),
            'idcode' => $this->getIdcode(),
            'idcode_return_proposal' => $this->getIdcodeReturnProposal(),
            'deduction' => $this->getDeduction(),
            'comment' => $this->getComment(),
            'return_cause' => $this->getReturnCause(),
            'return_state' => $this->getReturnState(),
            'service' => $this->getService(),
            'est_ship_date' => $this->getEstShipDate(),
            'is_processed' => $this->isProcessed(),
            'is_exported' => $this->isExported(),
            'created_date' => $this->getCreatedDate(),
            'delivery_information' => $this->getDeliveryInformation(),
        ];
    }
}
