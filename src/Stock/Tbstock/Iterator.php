<?php

declare(strict_types=1);

namespace Tradebyte\Stock\Tbstock;

use InvalidArgumentException;
use Tradebyte\Stock\Model\Stock;
use XMLReader;
use Tradebyte\Base;

class Iterator extends Base\Iterator implements \Iterator
{
    private ?Stock $current = null;
    private ?string $changeDate = null;

    public function getChangeDate(): ?string
    {
        if (!$this->getIsOpen()) {
            $this->open();
        }

        return $this->changeDate;
    }

    public function current(): Stock
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
                && $this->xmlReader->name == 'ARTICLE'
            ) {
                $xmlElement = new \SimpleXMLElement($this->xmlReader->readOuterXML());
                $model = new Stock();
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

        while ($this->xmlReader->read()) {
            if (
                $this->xmlReader->nodeType == XMLReader::ELEMENT
                && $this->xmlReader->depth == 0
                && $this->xmlReader->name == 'TBSTOCK'
            ) {
                $this->changeDate = $this->xmlReader->getAttribute('changedate');
                break;
            }
        }

        $this->isOpen = true;
    }
}
