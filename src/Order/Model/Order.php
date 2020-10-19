<?php

namespace Tradebyte\Order\Model;

use SimpleXMLElement;

/**
 * @package Tradebyte
 */
class Order
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $orderDate;

    /**
     * @var string
     */
    protected $orderCreatedDate;

    /**
     * @var string
     */
    protected $channelSign;

    /**
     * @var string
     */
    protected $channelId;

    /**
     * @var string
     */
    protected $channelNumber;

    /**
     * @var boolean
     */
    protected $isPaid;

    /**
     * @var boolean
     */
    protected $isApproved;

    /**
     * @var integer
     */
    protected $itemCount;

    /**
     * @var float
     */
    protected $totalItemAmount;

    /**
     * @var Item[]
     */
    protected $items;

    /**
     * @var History[]
     */
    protected $history;

    /**
     * @var Customer
     */
    protected $shipTo;

    /**
     * @var Customer
     */
    protected $sellTo;

    /**
     * @var float
     */
    protected $shipmentPrice;

    /**
     * @var string
     */
    protected $shipmentIdcodeShip;

    /**
     * @var string
     */
    protected $shipmentIdcodeReturn;

    /**
     * @var string
     */
    protected $shipmentRoutingCode;

    /**
     * @var float
     */
    protected $paymentCosts;


    /**
     * @var string
     */
    protected $paymentType;

    /**
     * @var string
     */
    protected $paymentDirectdebit;

    /**
     * @var string
     */
    protected $customerComment;

    /**
     * @var string
     */
    protected $billNumber;

    /**
     * @return integer
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param integer $id
     * @return Order
     */
    public function setId(int $id): Order
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderDate(): ?string
    {
        return $this->orderDate;
    }

    /**
     * @param string $orderDate
     * @return Order
     */
    public function setOrderDate(string $orderDate): Order
    {
        $this->orderDate = $orderDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderCreatedDate(): ?string
    {
        return $this->orderCreatedDate;
    }

    /**
     * @param string $orderCreatedDate
     * @return Order
     */
    public function setOrderCreatedDate(string $orderCreatedDate): Order
    {
        $this->orderCreatedDate = $orderCreatedDate;
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
     * @return Order
     */
    public function setChannelSign(string $channelSign): Order
    {
        $this->channelSign = $channelSign;
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
     * @return Order
     */
    public function setChannelId(string $channelId): Order
    {
        $this->channelId = $channelId;
        return $this;
    }

    /**
     * @return string
     */
    public function getChannelNumber(): ?string
    {
        return $this->channelNumber;
    }

    /**
     * @param string $channelNumber
     * @return Order
     */
    public function setChannelNumber(string $channelNumber): Order
    {
        $this->channelNumber = $channelNumber;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isPaid(): ?bool
    {
        return $this->isPaid;
    }

    /**
     * @param boolean $isPaid
     * @return Order
     */
    public function setIsPaid(bool $isPaid): Order
    {
        $this->isPaid = $isPaid;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isApproved(): ?bool
    {
        return $this->isApproved;
    }

    /**
     * @param boolean $isApproved
     * @return Order
     */
    public function setIsApproved(bool $isApproved): Order
    {
        $this->isApproved = $isApproved;
        return $this;
    }

    /**
     * @return integer
     */
    public function getItemCount(): ?int
    {
        return $this->itemCount;
    }

    /**
     * @param integer $itemCount
     * @return Order
     */
    public function setItemCount(int $itemCount): Order
    {
        $this->itemCount = $itemCount;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotalItemAmount(): ?float
    {
        return $this->totalItemAmount;
    }

    /**
     * @param float $totalItemAmount
     * @return Order
     */
    public function setTotalItemAmount(float $totalItemAmount): Order
    {
        $this->totalItemAmount = $totalItemAmount;
        return $this;
    }

    /**
     * @return Item[]
     */
    public function getItems(): ?array
    {
        return $this->items;
    }

    /**
     * @param Item[] $items
     * @return Order
     */
    public function setItems(array $items): Order
    {
        $this->items = $items;
        return $this;
    }

    /**
     * @return History[]
     */
    public function getHistory(): ?array
    {
        return $this->history;
    }

    /**
     * @param History[] $history
     * @return Order
     */
    public function setHistory(array $history): Order
    {
        $this->history = $history;
        return $this;
    }

    /**
     * @return Customer
     */
    public function getShipTo(): ?Customer
    {
        return $this->shipTo;
    }

    /**
     * @param Customer $shipTo
     * @return Order
     */
    public function setShipTo(Customer $shipTo): Order
    {
        $this->shipTo = $shipTo;
        return $this;
    }

    /**
     * @return Customer
     */
    public function getSellTo(): ?Customer
    {
        return $this->sellTo;
    }

    /**
     * @param Customer $sellTo
     * @return Order
     */
    public function setSellTo(Customer $sellTo): Order
    {
        $this->sellTo = $sellTo;
        return $this;
    }

    /**
     * @return float
     */
    public function getShipmentPrice(): ?float
    {
        return $this->shipmentPrice;
    }

    /**
     * @param float $shipmentPrice
     * @return Order
     */
    public function setShipmentPrice(float $shipmentPrice): Order
    {
        $this->shipmentPrice = $shipmentPrice;
        return $this;
    }

    /**
     * @return string
     */
    public function getShipmentIdcodeShip(): ?string
    {
        return $this->shipmentIdcodeShip;
    }

    /**
     * @param string $shipmentIdcodeShip
     * @return Order
     */
    public function setShipmentIdcodeShip(string $shipmentIdcodeShip): Order
    {
        $this->shipmentIdcodeShip = $shipmentIdcodeShip;
        return $this;
    }

    /**
     * @return string
     */
    public function getShipmentIdcodeReturn(): ?string
    {
        return $this->shipmentIdcodeReturn;
    }

    /**
     * @param string $shipmentIdcodeReturn
     * @return Order
     */
    public function setShipmentIdcodeReturn(string $shipmentIdcodeReturn): Order
    {
        $this->shipmentIdcodeReturn = $shipmentIdcodeReturn;
        return $this;
    }

    /**
     * @return string
     */
    public function getShipmentRoutingCode(): ?string
    {
        return $this->shipmentRoutingCode;
    }

    /**
     * @param string $shipmentRoutingCode
     * @return Order
     */
    public function setShipmentRoutingCode(string $shipmentRoutingCode): Order
    {
        $this->shipmentRoutingCode = $shipmentRoutingCode;
        return $this;
    }

    /**
     * @return float
     */
    public function getPaymentCosts(): ?float
    {
        return $this->paymentCosts;
    }

    /**
     * @param float $paymentCosts
     * @return Order
     */
    public function setPaymentCosts(float $paymentCosts): Order
    {
        $this->paymentCosts = $paymentCosts;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentType(): ?string
    {
        return $this->paymentType;
    }

    /**
     * @param string $paymentType
     * @return Order
     */
    public function setPaymentType(string $paymentType): Order
    {
        $this->paymentType = $paymentType;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentDirectdebit(): ?string
    {
        return $this->paymentDirectdebit;
    }

    /**
     * @param string $paymentDirectdebit
     * @return Order
     */
    public function setPaymentDirectdebit(string $paymentDirectdebit): Order
    {
        $this->paymentDirectdebit = $paymentDirectdebit;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerComment(): ?string
    {
        return $this->customerComment;
    }

    /**
     * @param string $customerComment
     * @return Order
     */
    public function setCustomerComment(string $customerComment): Order
    {
        $this->customerComment = $customerComment;
        return $this;
    }

    /**
     * @return string
     */
    public function getBillNumber(): ?string
    {
        return $this->billNumber;
    }

    /**
     * @param string $billNumber
     * @return Order
     */
    public function setBillNumber(string $billNumber): Order
    {
        $this->billNumber = $billNumber;
        return $this;
    }

    /**
     * @param SimpleXMLElement $xmlElement
     * @return void
     */
    public function fillFromSimpleXMLElement(SimpleXMLElement $xmlElement)
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
                $item->setEan((string)$xmlItem->EAN);
                $item->setQuantity((int)$xmlItem->QUANTITY);
                $item->setTransferPrice((float)$xmlItem->TRANSFER_PRICE);
                $item->setItemPrice((float)$xmlItem->ITEM_PRICE);
                $item->setCreatedDate((string)$xmlItem->DATE_CREATED);
                $this->items[] = $item;
            }
        }
    }

    /**
     * @return mixed[]
     */
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
