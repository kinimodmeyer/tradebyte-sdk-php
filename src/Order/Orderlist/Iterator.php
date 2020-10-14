<?php
namespace Tradebyte\Order\Orderlist;

use Tradebyte\Order\Model\Order;
use XMLReader;
use Tradebyte\Base;

/**
 * @package Tradebyte
 */
class Iterator extends Base\Iterator implements \Iterator
{
    /**
     * @return Order
     */
    public function current(): Order
    {
        return $this->current;
    }

    /**
     * @return void
     */
    public function next()
    {
        while ($this->xmlReader->read()) {
            if ($this->xmlReader->nodeType == XMLReader::ELEMENT
                && $this->xmlReader->depth === 1
                && $this->xmlReader->name == 'ORDER') {
                $xmlElement = new \SimpleXMLElement($this->xmlReader->readOuterXML());
                $model = new Order();
                $model->fillFromSimpleXMLElement($xmlElement);
                $this->current = $model;
                return;
            }
        }

        $this->current = null;
    }

    /**
     * @return void
     */
    public function rewind()
    {
        if ($this->xmlReader) {
            $this->xmlReader->close();
        }

        $this->xmlReader = $this->client->getRestClient()->getXML($this->url, $this->filter);

        parent::rewind();
    }
}
