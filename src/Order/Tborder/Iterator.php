<?php

namespace Tradebyte\Order\Tborder;

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
            if (
                $this->xmlReader->nodeType == XMLReader::ELEMENT
                && $this->xmlReader->depth === 1
                && $this->xmlReader->name == 'ORDER'
            ) {
                $xmlElement = new \SimpleXMLElement($this->xmlReader->readOuterXML());
                $model = new Order();
                $model->fillFromSimpleXMLElement($xmlElement);
                $this->current = $model;
                return;
            }
        }

        $this->current = null;
    }

    public function open()
    {
        if ($this->getIsOpen()) {
            $this->close();
        }

        if ($this->openLocalFilepath) {
            $this->xmlReader = new XMLReader();
            $this->xmlReader->open($this->url);
        } else {
            $this->xmlReader = $this->client->getRestClient()->getXML($this->url, $this->filter);
        }

        $this->isOpen = true;
    }
}
