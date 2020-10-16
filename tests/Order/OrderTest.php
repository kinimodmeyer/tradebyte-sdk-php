<?php
namespace Tradebyte\Order;

use Tradebyte\Base;
use Tradebyte\Order\Model\Order;

/**
 * @package Tradebyte
 */
class OrderTest extends Base
{
    public function testOrderObjectGetRawData()
    {
        $order = new Order();
        $order->setId(1);
        $this->assertSame([
            'id' => 1,
            'order_date' => null,
            'order_created_date' => null,
            'channel_sign' => null,
            'channel_id' => null,
            'channel_number' => null,
            'is_paid' => null,
            'is_approved' => null,
            'item_count' => null,
            'total_item_amount' => null,
            'shipment' => null,
            'payment' => null,
            'ship_to' => null,
            'sell_to' => null,
            'history' => null,
            'items' => null,
        ], $order->getRawData());
    }

}
