<?php
namespace Tradebyte\Order;

use SimpleXMLElement;
use Tradebyte\Client;
use Tradebyte\Order\Model\Order;
use XMLReader;
use XMLWriter;

/**
 * Handles all order data specific task.
 *
 * @package Tradebyte
 */
class Handler
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $orderId
     * @return Order
     */
    public function getOrder(int $orderId): Order
    {
        $catalog = new Tborderlist($this->client, 'orders/'.(int)$orderId, []);
        $orderIterator = $catalog->getOrders();
        $orderIterator->rewind();

        return $orderIterator->current();
    }

    /**
     * @param string $filePath
     * @return Order
     */
    public function getOrderFromFile(string $filePath): Order
    {
        $xmlElement = new SimpleXMLElement(file_get_contents($filePath));
        $model = new Order();
        $model->fillFromSimpleXMLElement($xmlElement);

        return $model;
    }

    /**
     * @param string $filePath
     * @param int $orderId
     * @return bool
     */
    public function downloadOrder(string $filePath, int $orderId): bool
    {
        $reader = $this->client->getRestClient()->getXML('orders/'.(int)$orderId, []);

        while ($reader->read()) {
            if ($reader->nodeType == XMLReader::ELEMENT
                && $reader->depth === 1
                && $reader->name == 'ORDER') {
                $filePut = file_put_contents($filePath, $reader->readOuterXml());
                $reader->close();
                return $filePut;
            }
        }

        $reader->close();

        return false;
    }

    /**
     * @param mixed[] $filter
     * @return Tborderlist
     */
    public function getOrderList($filter = []): Tborderlist
    {
        return new Tborderlist($this->client, 'orders/', $filter);
    }

    /**
     * @param string $filePath
     * @return Tborderlist
     */
    public function getOrderListFromFile(string $filePath): Tborderlist
    {
        return new Tborderlist($this->client, $filePath, [], true);
    }

    /**
     * @param string $filePath
     * @param array $filter
     * @return bool
     */
    public function downloadOrderList(string $filePath, array $filter = []): bool
    {
        return $this->client->getRestClient()->downloadFile($filePath, 'orders/', $filter);
    }

    /**
     * @param int $orderId
     * @return boolean
     */
    public function updateOrderExported(int $orderId)
    {
        $this->client->getRestClient()->postXML('orders/'.$orderId.'/exported');
        return true;
    }

    /**
     * @param string $filePath
     * @param int $channelId
     * @return string
     */
    public function updateOrderFromFile(string $filePath, int $channelId): string
    {
        return $this->client->getRestClient()->postXML('orders/?channel='.(int)$channelId, file_get_contents($filePath));
    }

    /**
     * @param int $channelId
     * @param Order $order
     * @return string
     */
    public function updateOrder(int $channelId, Order $order)
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

        if ($order->isApproved() !== null) {
            $writer->writeElement('APPROVED', $order->isApproved());
        }

        $writer->writeElement('ITEM_COUNT', $order->getItemCount());
        $writer->writeElement('TOTAL_ITEM_AMOUNT', $order->getTotalItemAmount());

        if ($order->getOrderCreatedDate() !== null) {
            $writer->writeElement('DATE_CREATED', $order->getOrderCreatedDate());
        }

        $writer->endElement();
        $writer->endElement();

        if ($order->getSellTo()) {
            $postData .= '<SELL_TO>
                                <CHANNEL_NO>' . $order->getSellTo()->getChannelNumber() . '</CHANNEL_NO>
                                <FIRSTNAME>' . $order->getSellTo()->getFirstname() . '</FIRSTNAME>
                                <LASTNAME>' . $order->getSellTo()->getLastname() . '</LASTNAME>
                                <NAME>' . $order->getSellTo()->getName() . '</NAME>
                                <STREET_NO>' . $order->getSellTo()->getStreetNumber() . '</STREET_NO>
                                <ZIP>' . $order->getSellTo()->getZip() . '</ZIP>
                                <CITY>' . $order->getSellTo()->getCity() . '</CITY>
                                <COUNTRY>' . $order->getSellTo()->getCountry() . '</COUNTRY>
                                <EMAIL>' . $order->getSellTo()->getEmail() . '</EMAIL>
                            </SELL_TO>';
        }

        if ($order->getShipTo()) {
            $postData .= '<SHIP_TO>
                                <CHANNEL_NO>' . $order->getShipTo()->getChannelNumber() . '</CHANNEL_NO>
                                <FIRSTNAME>' . $order->getShipTo()->getFirstname() . '</FIRSTNAME>
                                <LASTNAME>' . $order->getShipTo()->getLastname() . '</LASTNAME>
                                <NAME>' . $order->getShipTo()->getName() . '</NAME>
                                <STREET_NO>' . $order->getShipTo()->getStreetNumber() . '</STREET_NO>
                                <ZIP>' . $order->getShipTo()->getZip() . '</ZIP>
                                <CITY>' . $order->getShipTo()->getCity() . '</CITY>
                                <COUNTRY>' . $order->getShipTo()->getCountry() . '</COUNTRY>
                                <EMAIL>' . $order->getShipTo()->getEmail() . '</EMAIL>
                            </SHIP_TO>';
        }

        $postData .= '<ITEMS>';

        foreach ($order->getItems() as $item) {
            $postData .= '<ITEM>
                    <CHANNEL_ID>'.$item->getChannelId().'</CHANNEL_ID>
                    <SKU>'.$item->getSku().'</SKU>
                    <QUANTITY>'.$item->getQuantity().'</QUANTITY>
                    <TRANSFER_PRICE>'.$item->getTransferPrice().'</TRANSFER_PRICE>
                    <ITEM_PRICE>'.$item->getItemPrice().'</ITEM_PRICE>
                    <DATE_CREATED>'.$item->getCreatedDate().'</DATE_CREATED>
                </ITEM>';
        }

        $postData .= '</ITEMS></ORDER>';

        return $this->client->getRestClient()->postXML('orders/?channel='.(int)$channelId, $writer->outputMemory());
    }
}
