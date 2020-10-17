<?php
namespace Tradebyte\Message;

use Tradebyte\Base;
use Tradebyte\Client;
use Tradebyte\Message\Model\Message;

/**
 * @package Tradebyte
 */
class MessageTest extends Base
{
    /**
     * @return void
     */
    public function testGetTbmessageLocal(): void
    {
        $messageHandler = (new Client())->getMessageHandler();
        $catalog = $messageHandler->getTbmessageListLocal(__DIR__.'/../files/messages.xml');
        $messageIterator = $catalog->getMessages();
        $messageIterator->rewind();
        $messageModel = $messageIterator->current();

        $this->assertSame([
            'id' => 1,
            'type' => 'type_test',
            'order_id' => 2,
            'order_item_id' => 3,
            'sku' => 'sku_test',
            'channel_sign' => 'channel_sign_test',
            'channel_order_id' => 'channel_order_id_test',
            'quantity' => 4,
            'carrier_parcel_type' => 'carrier_test',
            'idcode' => 'idcode_test',
            'is_processed' => false,
            'is_exported' => true,
            'created_date' => '2016-09-09T14:14:17'
        ], $messageModel->getRawData());
    }

    /**
     * @return void
     */
    public function testMessageObjectGetRawData(): void
    {
        $message = new Message();
        $message->setId(1)
            ->setType('type_test')
            ->setOrderId(2)
            ->setOrderItemId(3)
            ->setSku('sku_test')
            ->setChannelSign('channel_sign_test')
            ->setChannelOrderId('channel_order_id_test')
            ->setQuantity(4)
            ->setCarrierParcelType('carrier_test')
            ->setIdcode('idcode_test')
            ->setIsExported(true)
            ->setIsProcessed(false)
            ->setCreatedDate('2016-09-09T14:14:17');
        $this->assertSame([
            'id' => 1,
            'type' => 'type_test',
            'order_id' => 2,
            'order_item_id' => 3,
            'sku' => 'sku_test',
            'channel_sign' => 'channel_sign_test',
            'channel_order_id' => 'channel_order_id_test',
            'quantity' => 4,
            'carrier_parcel_type' => 'carrier_test',
            'idcode' => 'idcode_test',
            'is_processed' => false,
            'is_exported' => true,
            'created_date' => '2016-09-09T14:14:17'
        ], $message->getRawData());
    }
}
