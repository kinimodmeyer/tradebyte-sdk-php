<?php

declare(strict_types=1);

namespace Tradebyte\Order\Model;

use SimpleXMLElement;

class Order
{
    private ?int $id = null;

    private ?string $orderDate = null;

    private ?string $orderCreatedDate = null;

    private ?string $channelSign = null;

    private ?string $channelId = null;

    private ?string $channelNumber = null;

    private ?bool $isPaid = null;

    private ?bool $isApproved = null;

    private ?int $itemCount = null;

    private ?float $totalItemAmount = null;

    /**
     * @var ?Item[]
     */
    private ?array $items = null;

    /**
     * @var ?History[]
     */
    private ?array $history = null;

    private ?Customer $shipTo = null;

    private ?Customer $sellTo = null;

    private ?float $shipmentPrice = null;

    private ?string $shipmentIdcodeShip = null;

    private ?string $shipmentIdcodeReturn = null;

    private ?string $shipmentRoutingCode = null;

    private ?float $paymentCosts = null;

    private ?string $paymentType = null;

    private ?string $paymentDirectdebit = null;

    private ?string $customerComment = null;

    private ?string $billNumber = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): Order
    {
        $this->id = $id;
        return $this;
    }

    public function getOrderDate(): ?string
    {
        return $this->orderDate;
    }

    public function setOrderDate(string $orderDate): Order
    {
        $this->orderDate = $orderDate;
        return $this;
    }

    public function getOrderCreatedDate(): ?string
    {
        return $this->orderCreatedDate;
    }

    public function setOrderCreatedDate(string $orderCreatedDate): Order
    {
        $this->orderCreatedDate = $orderCreatedDate;
        return $this;
    }

    public function getChannelSign(): ?string
    {
        return $this->channelSign;
    }

    public function setChannelSign(string $channelSign): Order
    {
        $this->channelSign = $channelSign;
        return $this;
    }

    public function getChannelId(): ?string
    {
        return $this->channelId;
    }

    public function setChannelId(string $channelId): Order
    {
        $this->channelId = $channelId;
        return $this;
    }

    public function getChannelNumber(): ?string
    {
        return $this->channelNumber;
    }

    public function setChannelNumber(string $channelNumber): Order
    {
        $this->channelNumber = $channelNumber;
        return $this;
    }

    public function isPaid(): ?bool
    {
        return $this->isPaid;
    }

    public function setIsPaid(bool $isPaid): Order
    {
        $this->isPaid = $isPaid;
        return $this;
    }

    public function isApproved(): ?bool
    {
        return $this->isApproved;
    }

    public function setIsApproved(bool $isApproved): Order
    {
        $this->isApproved = $isApproved;
        return $this;
    }

    public function getItemCount(): ?int
    {
        return $this->itemCount;
    }

    public function setItemCount(int $itemCount): Order
    {
        $this->itemCount = $itemCount;
        return $this;
    }

    public function getTotalItemAmount(): ?float
    {
        return $this->totalItemAmount;
    }

    public function setTotalItemAmount(float $totalItemAmount): Order
    {
        $this->totalItemAmount = $totalItemAmount;
        return $this;
    }

    /**
     * @return Item[]|null
     */
    public function getItems(): ?array
    {
        return $this->items;
    }

    /**
     * @param Item[] $items
     */
    public function setItems(array $items): Order
    {
        $this->items = $items;
        return $this;
    }

    /**
     * @return History[]|null
     */
    public function getHistory(): ?array
    {
        return $this->history;
    }

    /**
     * @param History[] $history
     */
    public function setHistory(array $history): Order
    {
        $this->history = $history;
        return $this;
    }

    public function getShipTo(): ?Customer
    {
        return $this->shipTo;
    }

    public function setShipTo(Customer $shipTo): Order
    {
        $this->shipTo = $shipTo;
        return $this;
    }

    public function getSellTo(): ?Customer
    {
        return $this->sellTo;
    }

    public function setSellTo(Customer $sellTo): Order
    {
        $this->sellTo = $sellTo;
        return $this;
    }

    public function getShipmentPrice(): ?float
    {
        return $this->shipmentPrice;
    }

    public function setShipmentPrice(float $shipmentPrice): Order
    {
        $this->shipmentPrice = $shipmentPrice;
        return $this;
    }

    public function getShipmentIdcodeShip(): ?string
    {
        return $this->shipmentIdcodeShip;
    }

    public function setShipmentIdcodeShip(string $shipmentIdcodeShip): Order
    {
        $this->shipmentIdcodeShip = $shipmentIdcodeShip;
        return $this;
    }

    public function getShipmentIdcodeReturn(): ?string
    {
        return $this->shipmentIdcodeReturn;
    }

    public function setShipmentIdcodeReturn(string $shipmentIdcodeReturn): Order
    {
        $this->shipmentIdcodeReturn = $shipmentIdcodeReturn;
        return $this;
    }

    public function getShipmentRoutingCode(): ?string
    {
        return $this->shipmentRoutingCode;
    }

    public function setShipmentRoutingCode(string $shipmentRoutingCode): Order
    {
        $this->shipmentRoutingCode = $shipmentRoutingCode;
        return $this;
    }

    public function getPaymentCosts(): ?float
    {
        return $this->paymentCosts;
    }

    public function setPaymentCosts(float $paymentCosts): Order
    {
        $this->paymentCosts = $paymentCosts;
        return $this;
    }

    public function getPaymentType(): ?string
    {
        return $this->paymentType;
    }

    public function setPaymentType(string $paymentType): Order
    {
        $this->paymentType = $paymentType;
        return $this;
    }

    public function getPaymentDirectdebit(): ?string
    {
        return $this->paymentDirectdebit;
    }

    public function setPaymentDirectdebit(string $paymentDirectdebit): Order
    {
        $this->paymentDirectdebit = $paymentDirectdebit;
        return $this;
    }

    public function getCustomerComment(): ?string
    {
        return $this->customerComment;
    }

    public function setCustomerComment(string $customerComment): Order
    {
        $this->customerComment = $customerComment;
        return $this;
    }

    public function getBillNumber(): ?string
    {
        return $this->billNumber;
    }

    public function setBillNumber(string $billNumber): Order
    {
        $this->billNumber = $billNumber;
        return $this;
    }

    public function fillFromSimpleXMLElement(SimpleXMLElement $xmlElement): void
    {
        $this->setId((int)$xmlElement->ORDER_DATA->TB_ID);
        $this->setOrderDate((string)$xmlElement->ORDER_DATA->ORDER_DATE);
        $this->setOrderCreatedDate((string)$xmlElement->ORDER_DATA->DATE_CREATED);
        $this->setChannelSign((string)$xmlElement->ORDER_DATA->CHANNEL_SIGN);
        $this->setChannelId((string)$xmlElement->ORDER_DATA->CHANNEL_ID);
        $this->setChannelNumber((string)$xmlElement->ORDER_DATA->CHANNEL_NO);
        $this->setIsPaid((bool)(int)$xmlElement->ORDER_DATA->PAID);
        $this->setIsApproved((bool)(int)$xmlElement->ORDER_DATA->APPROVED);
        $this->setCustomerComment((string)$xmlElement->ORDER_DATA->CUSTOMER_COMMENT);
        $this->setItemCount((int)$xmlElement->ORDER_DATA->ITEM_COUNT);
        $this->setTotalItemAmount((float)$xmlElement->ORDER_DATA->TOTAL_ITEM_AMOUNT);

        if (isset($xmlElement->SHIPMENT)) {
            if (isset($xmlElement->SHIPMENT->IDCODE_SHIP)) {
                $this->setShipmentIdcodeShip((string)$xmlElement->SHIPMENT->IDCODE_SHIP);
            }

            if (isset($xmlElement->SHIPMENT->IDCODE_RETURN)) {
                $this->setShipmentIdcodeReturn((string)$xmlElement->SHIPMENT->IDCODE_RETURN);
            }

            if (isset($xmlElement->SHIPMENT->ROUTING_CODE)) {
                $this->setShipmentRoutingCode((string)$xmlElement->SHIPMENT->ROUTING_CODE);
            }

            if (isset($xmlElement->SHIPMENT->PRICE)) {
                $this->setShipmentPrice((float)$xmlElement->SHIPMENT->PRICE);
            }
        }

        if (isset($xmlElement->PAYMENT)) {
            if (isset($xmlElement->PAYMENT->TYPE)) {
                $this->setPaymentType((string)$xmlElement->PAYMENT->TYPE);
            }

            if (isset($xmlElement->PAYMENT->DIRECTDEBIT)) {
                $this->setPaymentDirectdebit((string)$xmlElement->PAYMENT->DIRECTDEBIT);
            }

            if (isset($xmlElement->PAYMENT->COSTS)) {
                $this->setPaymentCosts((float)$xmlElement->PAYMENT->COSTS);
            }
        }

        foreach (['sell_to', 'ship_to'] as $customerType) {
            $upperCustomerType = strtoupper($customerType);

            if (isset($xmlElement->{$upperCustomerType})) {
                $customer = new Customer();
                $customer->setId((int)$xmlElement->{$upperCustomerType}->TB_ID);
                $customer->setChannelNumber((string)$xmlElement->{$upperCustomerType}->CHANNEL_NO);
                $customer->setTitle((string)$xmlElement->{$upperCustomerType}->TITLE);
                $customer->setFirstname((string)$xmlElement->{$upperCustomerType}->FIRSTNAME);
                $customer->setLastname((string)$xmlElement->{$upperCustomerType}->LASTNAME);
                $customer->setName((string)$xmlElement->{$upperCustomerType}->NAME);
                $customer->setNameExtension((string)$xmlElement->{$upperCustomerType}->NAME_EXTENSION);
                $customer->setStreetNumber((string)$xmlElement->{$upperCustomerType}->STREET_NO);
                $customer->setStreetExtension((string)$xmlElement->{$upperCustomerType}->STREET_EXTENSION);
                $customer->setZip((string)$xmlElement->{$upperCustomerType}->ZIP);
                $customer->setCity((string)$xmlElement->{$upperCustomerType}->CITY);
                $customer->setCountry((string)$xmlElement->{$upperCustomerType}->COUNTRY);
                $customer->setPhonePrivate((string)$xmlElement->{$upperCustomerType}->PHONE_PRIVATE);
                $customer->setPhoneOffice((string)$xmlElement->{$upperCustomerType}->PHONE_OFFICE);
                $customer->setPhoneMobile((string)$xmlElement->{$upperCustomerType}->PHONE_MOBILE);
                $customer->setEmail((string)$xmlElement->{$upperCustomerType}->EMAIL);
                $customer->setVatId((string)$xmlElement->{$upperCustomerType}->VAT_ID);

                if ($customerType == 'sell_to') {
                    $this->setSellTo($customer);
                } else {
                    $this->setShipTo($customer);
                }
            }
        }

        if (isset($xmlElement->HISTORY)) {
            foreach ($xmlElement->HISTORY->EVENT as $event) {
                $history = new History();
                $history->setId((int)$event->EVENT_ID);
                $history->setType((string)$event->EVENT_TYPE);
                $history->setCreatedDate((string)$event->DATE_CREATED);
                $this->history[] = $history;
            }
        }

        if (isset($xmlElement->ITEMS)) {
            foreach ($xmlElement->ITEMS->ITEM as $xmlItem) {
                $item = new Item();
                $item->setId((int)$xmlItem->TB_ID);
                $item->setChannelId((string)$xmlItem->CHANNEL_ID);
                $item->setSku((string)$xmlItem->SKU);
                $item->setChannelSku((string)$xmlItem->CHANNEL_SKU);
                $item->setEan((string)$xmlItem->EAN);
                $item->setQuantity((int)$xmlItem->QUANTITY);
                $item->setBillingText((string)$xmlItem->BILLING_TEXT);
                $item->setTransferPrice((float)$xmlItem->TRANSFER_PRICE);
                $item->setItemPrice((float)$xmlItem->ITEM_PRICE);
                $item->setCreatedDate((string)$xmlItem->DATE_CREATED);
                $this->items[] = $item;
            }
        }
    }

    public function getRawData(): array
    {
        $data = [
            'id' => $this->getId(),
            'order_date' => $this->getOrderDate(),
            'order_created_date' => $this->getOrderCreatedDate(),
            'channel_sign' => $this->getChannelSign(),
            'channel_id' => $this->getChannelId(),
            'channel_number' => $this->getChannelNumber(),
            'is_paid' => $this->isPaid(),
            'is_approved' => $this->isApproved(),
            'customer_comment' => $this->getCustomerComment(),
            'item_count' => $this->getItemCount(),
            'total_item_amount' => $this->getTotalItemAmount(),
            'shipment_idcode_return' => $this->getShipmentIdcodeReturn(),
            'shipment_idcode_ship' => $this->getShipmentIdcodeShip(),
            'shipment_routing_code' => $this->getShipmentRoutingCode(),
            'shipment_price' => $this->getShipmentPrice(),
            'payment_costs' => $this->getPaymentCosts(),
            'payment_directdebit' => $this->getPaymentDirectdebit(),
            'payment_type' => $this->getPaymentType(),
            'ship_to' => $this->getShipTo() ? $this->getShipTo()->getRawData() : null,
            'sell_to' => $this->getSellTo() ? $this->getSellTo()->getRawData() : null,
            'history' => null,
            'items' => null
        ];

        $history = $this->getHistory();

        if ($history) {
            foreach ($this->getHistory() as $history) {
                $data['history'][] = $history->getRawData();
            }
        }

        $items = $this->getItems();

        if ($items) {
            foreach ($this->getItems() as $item) {
                $data['items'][] = $item->getRawData();
            }
        }

        return $data;
    }
}
