<?php

namespace Tradebyte\Message;

use SimpleXMLElement;
use Tradebyte\Client;
use Tradebyte\Message\Model\Message;
use XMLReader;
use XMLWriter;

/**
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
     * @param integer $messageId
     * @return Message
     */
    public function getMessage(int $messageId): Message
    {
        $catalog = new Tbmessagelist($this->client, 'messages/' . (int)$messageId, []);
        $messageIterator = $catalog->getMessages();
        $messageIterator->rewind();

        return $messageIterator->current();
    }

    /**
     * @param string $filePath
     * @return Message
     */
    public function getMessageFromFile(string $filePath): Message
    {
        $xmlElement = new SimpleXMLElement(file_get_contents($filePath));
        $model = new Message();
        $model->fillFromSimpleXMLElement($xmlElement);

        return $model;
    }

    /**
     * @param string  $filePath
     * @param integer $messageId
     * @return boolean
     */
    public function downloadMessage(string $filePath, int $messageId): bool
    {
        $reader = $this->client->getRestClient()->getXML('messages/' . (int)$messageId, []);

        while ($reader->read()) {
            if (
                $reader->nodeType == XMLReader::ELEMENT
                && $reader->depth === 1
                && $reader->name == 'MESSAGE'
            ) {
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
     * @return Tbmessagelist
     */
    public function getMessageList($filter = []): Tbmessagelist
    {
        return new Tbmessagelist($this->client, 'messages/', $filter);
    }

    /**
     * @param string $filePath
     * @return Tbmessagelist
     */
    public function getMessageListFromFile(string $filePath): Tbmessagelist
    {
        return new Tbmessagelist($this->client, $filePath, [], true);
    }

    /**
     * @param string $filePath
     * @param array  $filter
     * @return boolean
     */
    public function downloadMessageList(string $filePath, array $filter = []): bool
    {
        return $this->client->getRestClient()->downloadFile($filePath, 'messages/', $filter);
    }

    /**
     * @param integer $messageId
     * @return boolean
     */
    public function updateMessageProcessed(int $messageId)
    {
        $this->client->getRestClient()->postXML('messages/' . $messageId . '/processed');
        return true;
    }

    /**
     * @param string $filePath
     * @return string
     */
    public function addMessagesFromMessageListFile(string $filePath): string
    {
        return $this->client->getRestClient()->postXMLFile($filePath, 'messages/');
    }

    /**
     * @param Message[] $stockArray
     * @return string
     */
    public function addMessages(array $stockArray): string
    {
        $writer = new XMLWriter();
        $writer->openMemory();
        $writer->startElement('MESSAGES_LIST');

        foreach ($stockArray as $message) {
            $writer->startElement('MESSAGE');

            if ($message->getId() !== null) {
                $writer->writeElement('MESSAGE_ID', $message->getId());
            }

            $writer->writeElement('MESSAGE_TYPE', $message->getType());
            $writer->writeElement('TB_ORDER_ID', $message->getOrderId());

            if ($message->getOrderItemId() !== null) {
                $writer->writeElement('TB_ORDER_ITEM_ID', $message->getOrderItemId());
            }

            if ($message->getSku() !== null) {
                $writer->writeElement('SKU', $message->getSku());
            }

            if ($message->getChannelSign() !== null) {
                $writer->writeElement('CHANNEL_SIGN', $message->getChannelSign());
            }

            if ($message->getChannelOrderId() !== null) {
                $writer->writeElement('CHANNEL_ORDER_ID', $message->getChannelOrderId());
            }

            if ($message->getChannelOrderItemId() !== null) {
                $writer->writeElement('CHANNEL_ORDER_ITEM_ID', $message->getChannelOrderId());
            }

            if ($message->getSku() !== null) {
                $writer->writeElement('SKU', $message->getSku());
            }

            if ($message->getChannelSign() !== null) {
                $writer->writeElement('CHANNEL_SIGN', $message->getChannelSign());
            }

            if ($message->getChannelOrderId() !== null) {
                $writer->writeElement('CHANNEL_ORDER_ID', $message->getChannelOrderId());
            }

            if ($message->getChannelOrderItemId() !== null) {
                $writer->writeElement('CHANNEL_ORDER_ITEM_ID', $message->getChannelOrderItemId());
            }

            if ($message->getChannelSku() !== null) {
                $writer->writeElement('CHANNEL_SKU', $message->getChannelSku());
            }

            $writer->writeElement('QUANTITY', $message->getQuantity());

            if ($message->getCarrierParcelType() !== null) {
                $writer->writeElement('CARRIER_PARCEL_TYPE', $message->getCarrierParcelType());
            }

            if ($message->getIdcode() !== null) {
                $writer->writeElement('IDCODE', $message->getIdcode());
            }

            if ($message->getIdcodeReturnProposal() !== null) {
                $writer->writeElement('IDCODE_RETURN_PROPOSAL', $message->getIdcodeReturnProposal());
            }

            if ($message->getDeduction() !== null) {
                $writer->writeElement('DEDUCTION', $message->getDeduction());
            }

            if ($message->getComment() !== null) {
                $writer->writeElement('COMMENT', $message->getComment());
            }

            if ($message->getReturnCause() !== null) {
                $writer->writeElement('RETURN_CAUSE', $message->getReturnCause());
            }

            if ($message->getReturnState() !== null) {
                $writer->writeElement('RETURN_STATE', $message->getReturnState());
            }

            if ($message->getService() !== null) {
                $writer->writeElement('SERVICE', $message->getService());
            }

            if ($message->getEstShipDate() !== null) {
                $writer->writeElement('EST_SHIP_DATE', $message->getEstShipDate());
            }

            if ($message->isProcessed() !== null) {
                $writer->writeElement('PROCESSED', $message->isProcessed());
            }

            if ($message->isExported() !== null) {
                $writer->writeElement('EXPORTED', $message->isExported());
            }

            if ($message->getCreatedDate() !== null) {
                $writer->writeElement('DATE_CREATED', $message->getCreatedDate());
            }

            if ($message->getDeliveryInformation() !== null) {
                $writer->writeElement('DELIVERY_INFORMATION', $message->getDeliveryInformation());
            }

            $writer->endElement();
        }

        $writer->endElement();
        return $this->client->getRestClient()->postXML('messages/', $writer->outputMemory());
    }
}
