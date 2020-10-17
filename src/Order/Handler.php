<?php
namespace Tradebyte\Order;

use Tradebyte\Client;
use Tradebyte\Order\Model\Order;
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
    public function getTborder(int $orderId): Order
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
    public function getTborderLocal(string $filePath): Order
    {
        $catalog = new Tborderlist($this->client, $filePath, [], true);
        $orderIterator = $catalog->getOrders();
        $orderIterator->rewind();

        return $orderIterator->current();
    }

    /**
     * @param string $filePath
     * @param int $orderId
     * @return bool
     */
    public function downloadTborder(string $filePath, int $orderId): bool
    {
        return $this->client->getRestClient()->downloadFile($filePath, 'orders/'.(int)$orderId, []);
    }

    /**
     * @param mixed[] $filter
     * @return Tborderlist
     */
    public function getTborderList($filter = []): Tborderlist
    {
        return new Tborderlist($this->client, 'orders/', $filter);
    }

    /**
     * @param string $filePath
     * @return Tborderlist
     */
    public function getTborderListLocal(string $filePath): Tborderlist
    {
        return new Tborderlist($this->client, $filePath, [], true);
    }

    /**
     * @param string $filePath
     * @param array $filter
     * @return bool
     */
    public function downloadTborderList(string $filePath, array $filter = []): bool
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
     * @param int $channelId
     * @param Order $order
     * @return string
     * @todo change to XMLWriter and add all fields
     */
    public function updateOrder(int $channelId, Order $order)
    {
        $postData  = '<?xml version="1.0" encoding="UTF-8"?>
                        <ORDER>
                            <ORDER_DATA>
                                <ORDER_DATE>'.$order->getOrderDate().'</ORDER_DATE>
                                <CHANNEL_SIGN>'.$order->getChannelSign().'</CHANNEL_SIGN>
                                <CHANNEL_ID>'.$order->getChannelId().'</CHANNEL_ID>
                                <APPROVED>'.$order->isApproved().'</APPROVED>
                                <ITEM_COUNT>'.$order->getItemCount().'</ITEM_COUNT>
                                <TOTAL_ITEM_AMOUNT>'.$order->getTotalItemAmount().'</TOTAL_ITEM_AMOUNT>
                                <DATE_CREATED>'.$order->getOrderCreatedDate().'</DATE_CREATED>
                            </ORDER_DATA>';

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

        return $this->client->getRestClient()->postXML('orders/?channel='.(int)$channelId, $postData);
    }
}
