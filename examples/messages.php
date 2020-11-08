<?php

require __DIR__ . '/loader.php';

$client = new Tradebyte\Client(['credentials' => $credentials]);
$messageHandler = $client->getMessageHandler();
$params = [];

/*
 * on the fly mode
 */
$messageList = $messageHandler->getMessageList($params);

foreach ($messageList->getMessages() as $message) {
    echo $message->getId();

    /*
     * acknowledge message received.
     *
     * try {
     *     $messageHandler->updateMessageExported($message->getId());
     * } catch (Exception $e) {
     *     echo $e->getMessage();
     *  }
     */
}

$messageList->close();

/*
 * download mode
 */
$messageHandler->downloadMessageList(__DIR__ . '/files/messages.xml', $params);
$messageList = $messageHandler->getMessageListFromFile(__DIR__ . '/files/messages.xml');

foreach ($messageList->getMessages() as $message) {
    echo $message->getId();
}

$messageList->close();

/*
$message = (new Tradebyte\Message\Model\Message())
    ->setType('SHIP')
    ->setOrderId(26)
    ->setOrderItemId(34)
    ->setQuantity(1);
$messageHandler->addMessages([$message]);
*/
