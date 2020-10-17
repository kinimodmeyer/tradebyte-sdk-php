<?php
namespace Tradebyte\Message;

use Tradebyte\Client;
use Tradebyte\Message\Model\Message;

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
     * @param int $messageId
     * @return Message
     */
    public function getTbmessage(int $messageId): Message
    {
        $catalog = new Tbmessagelist($this->client, 'messages/'.(int)$messageId, []);
        $messageIterator = $catalog->getMessages();
        $messageIterator->rewind();

        return $messageIterator->current();
    }

    /**
     * @param string $filePath
     * @return Message
     */
    public function getTbmessageLocal(string $filePath): Message
    {
        $catalog = new Tbmessagelist($this->client, $filePath, [], true);
        $messageIterator = $catalog->getMessages();
        $messageIterator->rewind();

        return $messageIterator->current();
    }

    /**
     * @param string $filePath
     * @param int $messageId
     * @return bool
     */
    public function downloadTbmessage(string $filePath, int $messageId): bool
    {
        return $this->client->getRestClient()->downloadFile($filePath, 'messages/'.(int)$messageId, []);
    }

    /**
     * @param mixed[] $filter
     * @return Tbmessagelist
     */
    public function getTbmessageList($filter = []): Tbmessagelist
    {
        return new Tbmessagelist($this->client, 'messages/', $filter);
    }

    /**
     * @param string $filePath
     * @return Tbmessagelist
     */
    public function getTbmessageListLocal(string $filePath): Tbmessagelist
    {
        return new Tbmessagelist($this->client, $filePath, [], true);
    }

    /**
     * @param string $filePath
     * @param array $filter
     * @return bool
     */
    public function downloadTbmessagesList(string $filePath, array $filter = []): bool
    {
        return $this->client->getRestClient()->downloadFile($filePath, 'messages/', $filter);
    }

    /**
     * @param int $messageId
     * @return boolean
     */
    public function updateMessageExported(int $messageId)
    {
        $this->client->getRestClient()->postXML('messages/'.$messageId.'/exported');
        return true;
    }

    /**
     * @param string $filePath
     * @todo implement
     */
    public function addMessagesFromFile(string $filePath)
    {
        //implement
    }

    /**
     * @param Message[] $stockArray
     * @return string
     * @todo change to XMLWriter and add all fields
     */
    public function addMessages(array $stockArray)
    {
        $postData  = '<?xml version="1.0" encoding="UTF-8"?><MESSAGES_LIST>';

        foreach ($stockArray as $message) {
            $postData .= '<MESSAGE>
                            <MESSAGE_TYPE>' . $message->getType() . '</MESSAGE_TYPE>
                            <TB_ORDER_ID>' . $message->getOrderId() . '</TB_ORDER_ID>
                            <TB_ORDER_ITEM_ID>' . $message->getOrderItemId() . '</TB_ORDER_ITEM_ID>
                            <QUANTITY>' . $message->getQuantity() . '</QUANTITY>
                        </MESSAGE>';
        }

        $postData .= '</MESSAGES_LIST>';
        return $this->client->getRestClient()->postXML('messages/', $postData);
    }
}
