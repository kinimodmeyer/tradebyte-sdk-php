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
     * @return mixed[]
     */
    private function getMessageFileRawData()
    {
        return [
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
        ];
    }

    /**
     * @return void
     */
    public function testGetMessageListFromFile(): void
    {
        $messageHandler = (new Client())->getMessageHandler();
        $messageList = $messageHandler->getMessageListFromFile(__DIR__ . '/../files/messagelist.xml');
        $messages = $messageList->getMessages();
        $messages->rewind();
        $messageModel = $messages->current();

        $this->assertSame($this->getMessageFileRawData(), $messageModel->getRawData());
    }

    /**
     * @return void
     */
    public function testGetMessageFromFile(): void
    {
        $messageHandler = (new Client())->getMessageHandler();
        $messageModel = $messageHandler->getMessageFromFile(__DIR__ . '/../files/message.xml');
        $this->assertSame($this->getMessageFileRawData(), $messageModel->getRawData());
    }

    /**
     * @return void
     */
    public function testUpdateMessageProcessed(): void
    {
        $mock = $this->getMockBuilder(Client\Rest::class)
            ->disableOriginalConstructor()
            ->setMethodsExcept(['postXML', 'setAccountNumber', 'setAccountUser', 'setAccountPassword', 'setBaseURL'])
            ->getMock();
        $mock->setAccountNumber(1234);
        $mock->setAccountUser('test');
        $mock->setAccountPassword('test');
        $mock->setBaseURL('localhost');
        $mock->expects($this->once())
            ->method('fileGetContents')
            ->with(
                $this->equalTo('localhost/1234/messages/1/processed'),
                $this->equalTo(false),
                $this->equalTo([
                    'http' => [
                        'method' => 'POST',
                        'header' => 'Authorization: Basic dGVzdDp0ZXN0' . "\r\n" .
                            'Content-Type: application/xml' . "\r\n" .
                            'Accept: application/xml' . "\r\n" .
                            'User-Agent: Tradebyte-SDK-PHP',
                        'content' => '',
                        'ignore_errors' => true,
                        'time_out' => 3600
                    ]
                ]),
            )
            ->will($this->returnValue(['content' => 'foo', 'status_line' => 'HTTP/1.0 200']));
        $client = new Client();
        $client->setRestClient($mock);
        $this->assertSame(true, $client->getMessageHandler()->updateMessageProcessed(1));
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
