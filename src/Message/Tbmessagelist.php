<?php

namespace Tradebyte\Message;

use Tradebyte\Client;

/**
 * @package Tradebyte
 */
class Tbmessagelist
{
    /**
     * @var Tbmessage\Iterator
     */
    protected $iterator;

    /**
     * @param Client  $client
     * @param string  $url
     * @param mixed[] $filter
     * @param boolean $localFile
     */
    public function __construct(Client $client, string $url, $filter = [], $localFile = false)
    {
        $this->iterator = new Tbmessage\Iterator($client, $url, $filter);
        $this->iterator->setOpenLocalFilepath($localFile);
    }

    /**
     * @return Tbmessage\Iterator
     */
    public function getMessages(): Tbmessage\Iterator
    {
        if (!$this->iterator->getIsOpen()) {
            $this->iterator->open();
        }

        return $this->iterator;
    }

    /**
     * @return void
     */
    public function close(): void
    {
        $this->iterator->close();
    }
}
