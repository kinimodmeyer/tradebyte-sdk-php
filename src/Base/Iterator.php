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
     * @var int
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
     * @var bool
     */
    protected $openLocalFilepath = false;

    /**
     * @param Client $client
     * @param string $url
     * @param mixed[] $filter
     */
    public function __construct(Client $client, string $url, array $filter = [])
    {
        $this->client = $client;
        $this->url = $url;
        $this->filter = $filter;
    }

    /**
     * @param bool $openLocalFilepath
     */
    public function setOpenLocalFilepath(bool $openLocalFilepath)
    {
        $this->openLocalFilepath = $openLocalFilepath;
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return !empty($this->current);
    }

    /**
     * @return int
     */
    public function key()
    {
        return $this->i;
    }

    /**
     * @return void
     */
    public function rewind()
    {
        $this->i = 0;
        $this->next();
    }
}
