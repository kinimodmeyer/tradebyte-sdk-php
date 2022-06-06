<?php

declare(strict_types=1);

namespace Tradebyte\Message\Tbmessage;

use InvalidArgumentException;
use Tradebyte\Message\Model\Message;
use XMLReader;
use Tradebyte\Base;

class Iterator extends Base\Iterator implements \Iterator
{
    private ?Message $current = null;

    public function current(): ?Message
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
                && $this->xmlReader->name == 'MESSAGE'
            ) {
                $xmlElement = new \SimpleXMLElement($this->xmlReader->readOuterXML());
                $model = new Message();
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
