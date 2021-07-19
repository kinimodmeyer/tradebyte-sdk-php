<?php

namespace Tradebyte\Order;

use Tradebyte\Base;
use Tradebyte\Client;
use Tradebyte\Order\Model\Customer;
use Tradebyte\Order\Model\History;
use Tradebyte\Order\Model\Item;
use Tradebyte\Order\Model\Order;

/**
 * @package Tradebyte
 */
class OrderTest extends Base
{
    /**
     * @return void
     */
    public function testGetOrderFormFile(): void
    {
        $orderHandler = (new Client())->getOrderHandler();
        $orderModel = $orderHandler->getOrderFromFile(__DIR__ . '/../files/order.xml');
        $expectedSubset = [
            'id' => 1,
            'order_date' => '2018-11-07',
            'channel_sign' => 'channel_sign_test',
            'channel_id' => 'channel_id_test',
            'channel_number' => 'channel_no_test',
            'is_paid' => true,
            'is_approved' => false,
            'customer_comment' => 'customer_comment_test',
            'item_count' => 1,
            'total_item_amount' => 1.0,
            'order_created_date' => '2018-11-07T10:35:57'
        ];
        $actualArray = $orderModel->getRawData();

        foreach ($expectedSubset as $key => $value) {
            $this->assertArrayHasKey($key, $actualArray);
            $this->assertSame($value, $actualArray[$key]);
        }
    }

    /**
     * @return void
     */
    public function testOrderGetRawData(): void
    {
        $order = new Order();
        $order->setId(1)
            ->setChannelId('12345')
            ->setChannelSign('zade')
            ->setChannelNumber('12345')
            ->setItemCount(2)
            ->setTotalItemAmount(20.0)
            ->setOrderCreatedDate('2019')
            ->setOrderDate('2019')
            ->setIsPaid(true)
            ->setIsApproved(false)
            ->setCustomerComment('comment')
            ->setHistory([(new History())->setId(1)
                ->setType('test')
                ->setCreatedDate('2019')])
            ->setShipmentPrice(20.0)
            ->setShipmentIdcodeShip('ship')
            ->setShipmentIdcodeReturn('return')
            ->setShipmentRoutingCode('code')
            ->setPaymentType('type')
            ->setPaymentCosts(20.0)
            ->setPaymentDirectdebit('debit');

        $item = new Item();
        $item->setId(1)
            ->setEan('12345')
            ->setItemPrice(40.0)
            ->setCreatedDate('2019')
            ->setQuantity(10)
            ->setBillingText('article test')
            ->setSku('12345')
            ->setChannelSku('54321')
            ->setChannelId('12345')
            ->setTransferPrice(50.0);
        $order->setItems([$item]);

        $customer = new Customer();
        $customer->setId(1)
            ->setChannelNumber('12345')
            ->setEmail('test@test.de')
            ->setFirstname('Test')
            ->setLastname('Test 2')
            ->setName('Test Test 2')
            ->setNameExtension('Ex')
            ->setCountry('Germany')
            ->setCity('Neuendettelsau')
            ->setZip('91564')
            ->setTitle('Dr')
            ->setVatId('123')
            ->setPhoneMobile('1')
            ->setPhoneOffice('2')
            ->setPhonePrivate('3')
            ->setStreetNumber('Muster 24')
            ->setStreetExtension('Ext');

        $order->setShipTo($customer);

        $customer = clone $customer;
        $customer->setFirstname('Tester');
        $order->setSellTo($customer);

        $this->assertSame([
            'id' => 1,
            'order_date' => '2019',
            'order_created_date' => '2019',
            'channel_sign' => 'zade',
            'channel_id' => '12345',
            'channel_number' => '12345',
            'is_paid' => true,
            'is_approved' => false,
            'customer_comment' => 'comment',
            'item_count' => 2,
            'total_item_amount' => 20.0,
            'shipment_idcode_return' => 'return',
            'shipment_idcode_ship' => 'ship',
            'shipment_routing_code' => 'code',
            'shipment_price' => 20.0,
            'payment_costs' => 20.0,
            'payment_directdebit' => 'debit',
            'payment_type' => 'type',
            'ship_to' => [
                'id' => 1,
                'channel_number' => '12345',
                'zip' => '91564',
                'city' => 'Neuendettelsau',
                'firstname' => 'Test',
                'lastname' => 'Test 2',
                'title' => 'Dr',
                'name' => 'Test Test 2',
                'name_extension' => 'Ex',
                'country' => 'Germany',
                'email' => 'test@test.de',
                'street_number' => 'Muster 24',
                'street_extension' => 'Ext',
                'phone_mobile' => '1',
                'phone_office' => '2',
                'phone_private' => '3',
                'vat_id' => '123'
            ],
            'sell_to' => [
                'id' => 1,
                'channel_number' => '12345',
                'zip' => '91564',
                'city' => 'Neuendettelsau',
                'firstname' => 'Tester',
                'lastname' => 'Test 2',
                'title' => 'Dr',
                'name' => 'Test Test 2',
                'name_extension' => 'Ex',
                'country' => 'Germany',
                'email' => 'test@test.de',
                'street_number' => 'Muster 24',
                'street_extension' => 'Ext',
                'phone_mobile' => '1',
                'phone_office' => '2',
                'phone_private' => '3',
                'vat_id' => '123'
            ],
            'history' => [
                [
                    'id' => 1,
                    'type' => 'test',
                    'created_date' => '2019',
                ]
            ],
            'items' => [
                [
                    'id' => 1,
                    'created_date' => '2019',
                    'channel_id' => '12345',
                    'ean' => '12345',
                    'item_price' => 40.0,
                    'quantity' => 10,
                    'billing_text' => 'article test',
                    'sku' => '12345',
                    'channel_sku' => '54321',
                    'transfer_price' => 50.0
                ]
            ],
        ], $order->getRawData());
    }
}
