<?php

declare(strict_types=1);

namespace Tradebyte\Message\Model;

use SimpleXMLElement;

class Message
{
    private ?int $id = null;

    private ?string $type = null;

    private ?int $orderId = null;

    private ?int $orderItemId = null;

    private ?string $sku = null;

    private ?string $channelSign = null;

    private ?string $channelOrderId = null;

    private ?string $channelOrderItemId = null;

    private ?string $channelSku = null;

    private ?int $quantity = null;

    private ?string $carrierParcelType = null;

    private ?string $idcode = null;

    private ?string $idcodeReturnProposal = null;

    private ?float $deduction = null;

    private ?string $comment = null;

    private ?string $returnCause = null;

    private ?string $returnState = null;

    private ?string $service = null;

    private ?string $estShipDate = null;

    private ?bool $isProcessed = null;

    private ?bool $isExported = null;

    private ?string $createdDate = null;

    private ?string $deliveryInformation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): Message
    {
        $this->id = $id;
        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): Message
    {
        $this->type = $type;
        return $this;
    }

    public function getOrderId(): ?int
    {
        return $this->orderId;
    }

    public function setOrderId(int $orderId): Message
    {
        $this->orderId = $orderId;
        return $this;
    }

    public function getOrderItemId(): ?int
    {
        return $this->orderItemId;
    }

    public function setOrderItemId(int $orderItemId): Message
    {
        $this->orderItemId = $orderItemId;
        return $this;
    }

    public function getSku(): ?string
    {
        return $this->sku;
    }

    public function setSku(string $sku): Message
    {
        $this->sku = $sku;
        return $this;
    }

    public function getChannelSign(): ?string
    {
        return $this->channelSign;
    }

    public function setChannelSign(string $channelSign): Message
    {
        $this->channelSign = $channelSign;
        return $this;
    }

    public function getChannelOrderId(): ?string
    {
        return $this->channelOrderId;
    }

    public function setChannelOrderId(string $channelOrderId): Message
    {
        $this->channelOrderId = $channelOrderId;
        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): Message
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function getCarrierParcelType(): ?string
    {
        return $this->carrierParcelType;
    }

    public function setCarrierParcelType(string $carrierParcelType): Message
    {
        $this->carrierParcelType = $carrierParcelType;
        return $this;
    }

    public function getIdcode(): ?string
    {
        return $this->idcode;
    }

    public function setIdcode(string $idcode): Message
    {
        $this->idcode = $idcode;
        return $this;
    }

    public function isProcessed(): ?bool
    {
        return $this->isProcessed;
    }

    public function setIsProcessed(bool $isProcessed): Message
    {
        $this->isProcessed = $isProcessed;
        return $this;
    }

    public function isExported(): ?bool
    {
        return $this->isExported;
    }

    public function setIsExported(bool $isExported): Message
    {
        $this->isExported = $isExported;
        return $this;
    }

    public function getCreatedDate(): ?string
    {
        return $this->createdDate;
    }

    public function setCreatedDate(string $createdDate): Message
    {
        $this->createdDate = $createdDate;
        return $this;
    }

    public function getChannelOrderItemId(): ?string
    {
        return $this->channelOrderItemId;
    }

    public function setChannelOrderItemId(string $channelOrderItemId): Message
    {
        $this->channelOrderItemId = $channelOrderItemId;
        return $this;
    }

    public function getChannelSku(): ?string
    {
        return $this->channelSku;
    }

    public function setChannelSku(string $channelSku): Message
    {
        $this->channelSku = $channelSku;
        return $this;
    }

    public function getIdcodeReturnProposal(): ?string
    {
        return $this->idcodeReturnProposal;
    }

    public function setIdcodeReturnProposal(string $idcodeReturnProposal): Message
    {
        $this->idcodeReturnProposal = $idcodeReturnProposal;
        return $this;
    }

    public function getDeduction(): ?float
    {
        return $this->deduction;
    }

    public function setDeduction(float $deduction): Message
    {
        $this->deduction = $deduction;
        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): Message
    {
        $this->comment = $comment;
        return $this;
    }

    public function getReturnCause(): ?string
    {
        return $this->returnCause;
    }

    public function setReturnCause(string $returnCause): Message
    {
        $this->returnCause = $returnCause;
        return $this;
    }

    public function getReturnState(): ?string
    {
        return $this->returnState;
    }

    public function setReturnState(string $returnState): Message
    {
        $this->returnState = $returnState;
        return $this;
    }

    public function getService(): ?string
    {
        return $this->service;
    }

    public function setService(string $service): Message
    {
        $this->service = $service;
        return $this;
    }

    public function getEstShipDate(): ?string
    {
        return $this->estShipDate;
    }

    public function setEstShipDate(string $estShipDate): Message
    {
        $this->estShipDate = $estShipDate;
        return $this;
    }

    public function getDeliveryInformation(): ?string
    {
        return $this->deliveryInformation;
    }

    public function setDeliveryInformation(string $deliveryInformation): Message
    {
        $this->deliveryInformation = $deliveryInformation;
        return $this;
    }

    public function fillFromSimpleXMLElement(SimpleXMLElement $xmlElement): void
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
        $this->setDeduction((float)$xmlElement->DEDUCTION);
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

    public function getRawData(): array
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
