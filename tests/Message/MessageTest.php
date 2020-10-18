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
    public function testGetMessageFromFile(): void
    {
        $messageHandler = (new Client())->getMessageHandler();
        $messageModel = $messageHandler->getMessageFromFile(__DIR__.'/../files/message.xml');

        $this->assertSame([
            'id' => 1,
            'type' => 'type_test',
            'order_id' => 2,
            'order_item_id' => 3,
            'sku' => 'sku_test',
            'channel_sign' => 'channel_sign_test',
            'channel_order_id' => 'channel_order_id_test',
            'channel_order_item_id' => 'channel_order_item_id_test',
            'channel_sku' => 'channel_sku_test',
            'quantity' => 4,
            'carrier_parcel_type' => 'carrier_test',
            'idcode' => 'idcode_test',
            'idcode_return_proposal' => 'idcode_return_proposal_test',
            'deduction' => '10',
            'comment' => 'comment_test',
            'return_cause' => 'return_cause_test',
            'return_state' => 'return_state_test',
            'service' => 'service_test',
            'est_ship_date' => 'est_ship_date_test',
            'is_processed' => false,
            'is_exported' => true,
            'created_date' => '2016-09-09T14:14:17',
            'delivery_information' => 'delivery_information_test',
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
            ->setChannelOrderItemId('channel_order_item_id_test')
            ->setChannelSku('channel_sku_test')
            ->setQuantity(4)
            ->setCarrierParcelType('carrier_test')
            ->setIdcode('idcode_test')
            ->setIdcodeReturnProposal('idcode_return_proposal_test')
            ->setDeduction(20)
            ->setComment('comment_test')
            ->setReturnState('return_state_test')
            ->setReturnCause('return_cause_test')
            ->setService('service_test')
            ->setEstShipDate('est_ship_date_test')
            ->setIsExported(true)
            ->setIsProcessed(false)
            ->setCreatedDate('2016-09-09T14:14:17')
            ->setDeliveryInformation('delivery_infromation_test');
        $this->assertSame([
            'id' => 1,
            'type' => 'type_test',
            'order_id' => 2,
            'order_item_id' => 3,
            'sku' => 'sku_test',
            'channel_sign' => 'channel_sign_test',
            'channel_order_id' => 'channel_order_id_test',
            'channel_order_item_id' => 'channel_order_item_id_test',
            'channel_sku' => 'channel_sku_test',
            'quantity' => 4,
            'carrier_parcel_type' => 'carrier_test',
            'idcode' => 'idcode_test',
            'idcode_return_proposal' => 'idcode_return_proposal_test',
            'deduction' => '20',
            'comment' => 'comment_test',
            'return_cause' => 'return_cause_test',
            'return_state' => 'return_state_test',
            'service' => 'service_test',
            'est_ship_date' => 'est_ship_date_test',
            'is_processed' => false,
            'is_exported' => true,
            'created_date' => '2016-09-09T14:14:17',
            'delivery_information' => 'delivery_infromation_test'
        ], $message->getRawData());
    }
}
