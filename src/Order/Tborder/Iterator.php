<?php

declare(strict_types=1);

namespace Tradebyte\Order\Tborder;

use InvalidArgumentException;
use Tradebyte\Order\Model\Order;
use XMLReader;
use Tradebyte\Base;

class Iterator extends Base\Iterator implements \Iterator
{
    private ?Order $current = null;

    public function current(): ?Order
    {
        return $this->current;
    }

    public function valid(): bool
    {
        return !empty($this->current);
    }

    public function next(): void
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

    public function open(): void
    {
        if ($this->getIsOpen()) {
            $this->close();
        }

        if ($this->openLocalFilepath) {
            $this->xmlReader = new XMLReader();

            if (@$this->xmlReader->open($this->url) === false) {
                throw new InvalidArgumentException('can not open file ' . $this->url);
            }
        } else {
            $this->xmlReader = $this->client->getRestClient()->getXML($this->url, $this->filter);
        }

        $this->isOpen = true;
    }
}
