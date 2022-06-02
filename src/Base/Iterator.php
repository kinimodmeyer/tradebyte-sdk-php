<?php

namespace Tradebyte\Base;

use Tradebyte\Client;
use Tradebyte\Order\Model\Order;
use XMLReader;

/**
 * @package Tradebyte
 */
class Iterator
{
    /**
     * @var XMLReader
     */
    protected $xmlReader = null;

    /**
     * @var Order
     */
    protected $current;

    /**
     * @var integer
     */
    protected $i = 0;

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var mixed[]
     */
    protected $filter;

    /**
     * @var boolean
     */
    protected $openLocalFilepath = false;

    /**
     * @var boolean
     */
    protected $isOpen = false;

    /**
     * @param Client  $client
     * @param string  $url
     * @param mixed[] $filter
     */
    public function __construct(Client $client, string $url, array $filter = [])
    {
        $this->client = $client;
        $this->url = $url;
        $this->filter = $filter;
    }

    /**
     * @param boolean $openLocalFilepath
     */
    public function setOpenLocalFilepath(bool $openLocalFilepath)
    {
        $this->openLocalFilepath = $openLocalFilepath;
    }

    /**
     * @return boolean
     */
    public function valid(): bool
    {
        return !empty($this->current);
    }

    /**
     * @return integer
     */
    public function key(): int
    {
        return $this->i;
    }

    /**
     * @return void
     */
    public function rewind(): void
    {
        $this->i = 0;
        $this->isOpen = false;
        $this->open();
        $this->next();
    }

    /**
     * @return boolean
     */
    public function getIsOpen(): bool
    {
        return $this->isOpen;
    }

    /**
     * @return void
     */
    public function close(): void
    {
        $this->xmlReader->close();
    }
}
