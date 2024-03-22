<?php

declare(strict_types=1);

namespace Tradebyte\Order;

use SimpleXMLElement;
use Tradebyte\Client;
use Tradebyte\Order\Model\Order;
use XMLReader;
use XMLWriter;

/**
 * Handles all order data specific task.
 */
class Handler
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getOrder(int $orderId): ?Order
    {
        $catalog = new Tborderlist($this->client, 'orders/' . (int)$orderId, []);
        $orderIterator = $catalog->getOrders();
        $orderIterator->rewind();

        return $orderIterator->current();
    }

    public function getOrderFromFile(string $filePath): Order
    {
        $xmlElement = new SimpleXMLElement(file_get_contents($filePath));
        $model = new Order();
        $model->fillFromSimpleXMLElement($xmlElement);

        return $model;
    }

    public function downloadOrder(string $filePath, int $orderId): bool
    {
        $reader = $this->client->getRestClient()->getXML('orders/' . $orderId);

        while ($reader->read()) {
            if (
                $reader->nodeType == XMLReader::ELEMENT
                && $reader->depth === 1
                && $reader->name == 'ORDER'
            ) {
                $filePut = (bool)file_put_contents($filePath, $reader->readOuterXml());
                $reader->close();
                return $filePut;
            }
        }

        $reader->close();

        return false;
    }

    public function getOrderList($filter = []): Tborderlist
    {
        return new Tborderlist($this->client, 'orders/', $filter);
    }

    public function getOrderListFromFile(string $filePath): Tborderlist
    {
        return new Tborderlist($this->client, $filePath, [], true);
    }

    public function downloadOrderList(string $filePath, array $filter = []): bool
    {
        return $this->client->getRestClient()->downloadFile($filePath, 'orders/', $filter);
    }

    public function updateOrderExported(int $orderId): bool
    {
        $this->client->getRestClient()->postXML('orders/' . $orderId . '/exported');
        return true;
    }

    public function updateOrderFromFile(string $filePath, int $channelId): string
    {
        return $this->client->getRestClient()->postXML(
            'orders/?channel=' . (int)$channelId,
            file_get_contents($filePath)
        );
    }

    public function updateOrder(int $channelId, Order $order): string
    {
        $writer = new XMLWriter();
        $writer->openMemory();
        $writer->startElement('ORDER');
        $writer->startElement('ORDER_DATA');
        $writer->writeElement('ORDER_DATE', $order->getOrderDate());

        if ($order->getId() !== null) {
            $writer->writeElement('TB_ID', $order->getId());
        }

        if ($order->getChannelSign() !== null) {
            $writer->writeElement('CHANNEL_SIGN', $order->getChannelSign());
        }

        $writer->writeElement('CHANNEL_ID', $order->getChannelId());

        if ($order->getChannelNumber() !== null) {
            $writer->writeElement('CHANNEL_NO', $order->getChannelNumber());
        }

        if ($order->getBillNumber() !== null) {
            $writer->writeElement('BILL_NO', $order->getBillNumber());
        }

        if ($order->isPaid() !== null) {
            $writer->writeElement('PAID', $order->isPaid());
        }

        $writer->writeElement('APPROVED', $order->isApproved());
        $writer->writeElement('ITEM_COUNT', $order->getItemCount());
        $writer->writeElement('TOTAL_ITEM_AMOUNT', $order->getTotalItemAmount());

        if ($order->getOrderCreatedDate() !== null) {
            $writer->writeElement('DATE_CREATED', $order->getOrderCreatedDate());
        }

        $writer->endElement();

        if ($order->getSellTo() !== null) {
            $customer = $order->getSellTo();
            $writer->startElement('SELL_TO');

            if ($customer->getChannelNumber() !== null) {
                $writer->writeElement('CHANNEL_NO', $customer->getChannelNumber());
            }

            $writer->writeElement('FIRSTNAME', $customer->getFirstname());
            $writer->writeElement('LASTNAME', $customer->getLastname());

            if ($customer->getName() !== null) {
                $writer->writeElement('NAME', $customer->getName());
            }

            $writer->writeElement('STREET_NO', $customer->getStreetNumber());
            $writer->writeElement('ZIP', $customer->getZip());
            $writer->writeElement('CITY', $customer->getCity());
            $writer->writeElement('COUNTRY', $customer->getCountry());
            $writer->endElement();
        }

        $customer = $order->getShipTo();
        $writer->startElement('SHIP_TO');

        if ($customer->getChannelNumber() !== null) {
            $writer->writeElement('CHANNEL_NO', $customer->getChannelNumber());
        }

        $writer->writeElement('FIRSTNAME', $customer->getFirstname());
        $writer->writeElement('LASTNAME', $customer->getLastname());

        if ($customer->getName() !== null) {
            $writer->writeElement('NAME', $customer->getName());
        }

        $writer->writeElement('STREET_NO', $customer->getStreetNumber());
        $writer->writeElement('ZIP', $customer->getZip());
        $writer->writeElement('CITY', $customer->getCity());
        $writer->writeElement('COUNTRY', $customer->getCountry());
        $writer->endElement();

        $writer->startElement('ITEMS');

        foreach ($order->getItems() as $item) {
            $writer->startElement('ITEM');
            $writer->writeElement('CHANNEL_ID', $item->getChannelId());
            $writer->writeElement('SKU', $item->getSku());
            $writer->writeElement('QUANTITY', $item->getQuantity());

            if ($item->getTransferPrice() !== null) {
                $writer->writeElement('TRANSFER_PRICE', $item->getTransferPrice());
            }

            $writer->writeElement('ITEM_PRICE', $item->getItemPrice());

            if ($item->getCreatedDate() !== null) {
                $writer->writeElement('DATE_CREATED', $item->getCreatedDate());
            }

            $writer->endElement();
        }

        $writer->endElement();
        $writer->endElement();

        return $this->client->getRestClient()->postXML('orders/?channel=' . (int)$channelId, $writer->outputMemory());
    }
}
