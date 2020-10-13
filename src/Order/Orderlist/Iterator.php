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

        if ($this->type == 'orderlist') {
            $this->xmlReader = $this->client->getRestClient()->getXML('orders', $this->filter);
        }

        parent::rewind();
    }
}
