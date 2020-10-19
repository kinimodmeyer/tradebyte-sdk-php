<?php

namespace Tradebyte\Order;

use Tradebyte\Client;

/**
 * @package Tradebyte
 */
class Tborderlist
{
    /**
     * @var Tborder\Iterator
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
        $this->iterator = new Tborder\Iterator($client, $url, $filter);
        $this->iterator->setOpenLocalFilepath($localFile);
    }

    /**
     * @return Tborder\Iterator
     */
    public function getOrders(): Tborder\Iterator
    {
        if (!$this->iterator->getIsOpen()) {
            $this->iterator->open();
        }

        return $this->iterator;
    }

    public function close(): void
    {
        $this->iterator->close();
    }
}
