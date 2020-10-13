<?php
namespace Tradebyte\Order\Model;

use SimpleXMLElement;

/**
 * @package Tradebyte
 */
class Order
{
    /**
     * @var int
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
     * @var bool
     */
    protected $isPaid;

    /**
     * @var bool
     */
    protected $isApproved;

    /**
     * @var int
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
     * @var Shipment
     */
    protected $shipment;

    /**
     * @var Payment
     */
    protected $payment;

    /**
     * @var Customer
     */
    protected $shipTo;

    /**
     * @var Customer
     */
    protected $sellTo;

    /**
     * @return int
     */
    public function getId(): int
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
    public function getOrderDate(): string
    {
        return $this->orderDate;
    }

    /**
     * @param string $orderDate
     */
    public function setOrderDate(string $orderDate): void
    {
        $this->orderDate = $orderDate;
    }

    /**
     * @return string
     */
    public function getOrderCreatedDate(): string
    {
        return $this->orderCreatedDate;
    }

    /**
     * @param string $orderCreatedDate
     */
    public function setOrderCreatedDate(string $orderCreatedDate): void
    {
        $this->orderCreatedDate = $orderCreatedDate;
    }

    /**
     * @return string
     */
    public function getChannelSign(): string
    {
        return $this->channelSign;
    }

    /**
     * @param string $channelSign
     */
    public function setChannelSign(string $channelSign): void
    {
        $this->channelSign = $channelSign;
    }

    /**
     * @return string
     */
    public function getChannelId(): string
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
    public function getChannelNumber(): string
    {
        return $this->channelNumber;
    }

    /**
     * @param string $channelNumber
     */
    public function setChannelNumber(string $channelNumber): void
    {
        $this->channelNumber = $channelNumber;
    }

    /**
     * @return bool
     */
    public function isPaid(): bool
    {
        return $this->isPaid;
    }

    /**
     * @param bool $isPaid
     */
    public function setIsPaid(bool $isPaid): void
    {
        $this->isPaid = $isPaid;
    }

    /**
     * @return bool
     */
    public function isApproved(): bool
    {
        return $this->isApproved;
    }

    /**
     * @param bool $isApproved
     */
    public function setIsApproved(bool $isApproved): void
    {
        $this->isApproved = $isApproved;
    }

    /**
     * @return int
     */
    public function getItemCount(): int
    {
        return $this->itemCount;
    }

    /**
     * @param int $itemCount
     */
    public function setItemCount(int $itemCount): void
    {
        $this->itemCount = $itemCount;
    }

    /**
     * @return float
     */
    public function getTotalItemAmount(): float
    {
        return $this->totalItemAmount;
    }

    /**
     * @param float $totalItemAmount
     */
    public function setTotalItemAmount(float $totalItemAmount): void
    {
        $this->totalItemAmount = $totalItemAmount;
    }

    /**
     * @return Item[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param Item[] $items
     */
    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    /**
     * @return History[]
     */
    public function getHistory(): array
    {
        return $this->history;
    }

    /**
     * @param History[] $history
     */
    public function setHistory(array $history): void
    {
        $this->history = $history;
    }

    /**
     * @return Shipment
     */
    public function getShipment(): Shipment
    {
        return $this->shipment;
    }

    /**
     * @param Shipment $shipment
     */
    public function setShipment(Shipment $shipment): void
    {
        $this->shipment = $shipment;
    }

    /**
     * @return Payment
     */
    public function getPayment(): Payment
    {
        return $this->payment;
    }

    /**
     * @param Payment $payment
     */
    public function setPayment(Payment $payment): void
    {
        $this->payment = $payment;
    }

    /**
     * @return Customer
     */
    public function getShipTo(): Customer
    {
        return $this->shipTo;
    }

    /**
     * @param Customer $shipTo
     */
    public function setShipTo(Customer $shipTo): void
    {
        $this->shipTo = $shipTo;
    }

    /**
     * @return Customer
     */
    public function getSellTo(): Customer
    {
        return $this->sellTo;
    }

    /**
     * @param Customer $sellTo
     */
    public function setSellTo(Customer $sellTo): void
    {
        $this->sellTo = $sellTo;
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
        $this->setIsPaid((bool)$xmlElement->ORDER_DATA->PAID);
        $this->setIsApproved((bool)$xmlElement->ORDER_DATA->APPROVED);
        $this->setItemCount((int)$xmlElement->ORDER_DATA->ITEM_COUNT);
        $this->setTotalItemAmount((float)$xmlElement->ORDER_DATA->TOTAL_ITEM_AMOUNT);

        if (isset($xmlElement->SHIPMENT)) {
            $shipment = new Shipment();

            if (isset($xmlElement->SHIPMENT->IDCODE_SHIP)) {
                $shipment->setIdcodeShip((string)$xmlElement->SHIPMENT->IDCODE_SHIP);
            }

            if (isset($xmlElement->SHIPMENT->IDCODE_RETURN)) {
                $shipment->setIdcodeReturn((string)$xmlElement->SHIPMENT->IDCODE_RETURN);
            }

            if (isset($xmlElement->SHIPMENT->ROUTING_CODE)) {
                $shipment->setRoutingCode((string)$xmlElement->SHIPMENT->ROUTING_CODE);
            }

            if (isset($xmlElement->SHIPMENT->PRICE)) {
                $shipment->setPrice((float)$xmlElement->SHIPMENT->PRICE);
            }

            $this->setShipment($shipment);
        }

        if (isset($xmlElement->PAYMENT)) {
            $payment = new Payment();

            if (isset($xmlElement->PAYMENT->TYPE)) {
                $payment->setType((string)$xmlElement->PAYMENT->TYPE);
            }

            if (isset($xmlElement->PAYMENT->DIRECTDEBIT)) {
                $payment->setDirectdebit((string)$xmlElement->PAYMENT->DIRECTDEBIT);
            }

            if (isset($xmlElement->PAYMENT->COSTS)) {
                $payment->setCosts((float)$xmlElement->PAYMENT->COSTS);
            }

            $this->setPayment($payment);
        }

        foreach (['sell_to', 'ship_to'] as $customerType) {
            $upperCustomerType = strtoupper($customerType);
            $customer = new Customer();
            $customer->setId((int)$xmlElement->{$upperCustomerType}->TB_ID);
            $customer->setChannelNumber((string)$xmlElement->{$upperCustomerType}->CHANNEL_NO);
            $customer->setFirstname((string)$xmlElement->{$upperCustomerType}->FIRSTNAME);
            $customer->setLastname((string)$xmlElement->{$upperCustomerType}->LASTNAME);
            $customer->setName((string)$xmlElement->{$upperCustomerType}->NAME);
            $customer->setStreetNumber((string)$xmlElement->{$upperCustomerType}->STREET_NO);
            $customer->setZip((string)$xmlElement->{$upperCustomerType}->ZIP);
            $customer->setCity((string)$xmlElement->{$upperCustomerType}->CITY);
            $customer->setCountry((string)$xmlElement->{$upperCustomerType}->COUNTRY);
            $customer->setEmail((string)$xmlElement->{$upperCustomerType}->EMAIL);

            if ($customerType == 'sell_to') {
                $this->setSellTo($customer);
            } else {
                $this->setShipTo($customer);
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
    public function getRawData()
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
            'item_count' => $this->getItemCount(),
            'total_item_amount' => $this->getTotalItemAmount(),
            'shipment' => $this->getShipment()->getRawData(),
            'payment' => $this->getPayment()->getRawData(),
            'ship_to' => $this->getShipTo()->getRawData(),
            'sell_to' => $this->getSellTo()->getRawData(),
        ];

        foreach ($this->getHistory() as $history) {
            $data['history'][] = $history->getRawData();
        }

        foreach ($this->getItems() as $item) {
            $data['items'][] = $item->getRawData();
        }

        return $data;
    }
}

