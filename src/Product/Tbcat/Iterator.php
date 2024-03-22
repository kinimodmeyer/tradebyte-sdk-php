<?php

declare(strict_types=1);

namespace Tradebyte\Product\Tbcat;

use InvalidArgumentException;
use SimpleXMLElement;
use Tradebyte\Product\Model\Product;
use XMLReader;
use Tradebyte\Base;

class Iterator extends Base\Iterator implements \Iterator
{
    private ?Product $current = null;
    private ?string $supplierName = null;

    public function getSupplierName(): ?string
    {
        if (!$this->getIsOpen()) {
            $this->open();
        }

        return $this->supplierName;
    }

    public function current(): ?Product
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
                && $this->xmlReader->depth == 2
                && $this->xmlReader->name == 'PRODUCT'
            ) {
                $xmlElement = new SimpleXMLElement($this->xmlReader->readOuterXML());
                $product = new Product();
                $product->fillFromSimpleXMLElement($xmlElement);
                $this->current = $product;
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
                && $this->xmlReader->depth == 1
                && $this->xmlReader->name == 'SUPPLIER'
            ) {
                $xmlElement = new SimpleXMLElement($this->xmlReader->readOuterXML());
                $this->supplierName = (string)$xmlElement->NAME;
                break;
            }
        }

        $this->isOpen = true;
    }
}
