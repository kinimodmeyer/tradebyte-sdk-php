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
    protected $type;

    /**
     * @var mixed[]
     */
    protected $filter;

    /**
     * @param Client $client
     * @param string $type
     * @param mixed[] $filter
     */
    public function __construct(Client $client, string $type, array $filter)
    {
        $this->client = $client;
        $this->filter = $filter;
        $this->type = $type;
    }

    /**
     * @return Model
     */
    public function current()
    {
        return $this->current;
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
