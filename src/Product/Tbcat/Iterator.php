<?php
namespace Tradebyte\Product\Tbcat;

use SimpleXMLElement;
use Tradebyte\Product\Model\Product;
use XMLReader;
use Tradebyte\Base;

/**
 * @package Tradebyte
 */
class Iterator extends Base\Iterator implements \Iterator
{
    /**
     * @var string
     */
    protected $supplierName;

    /**
     * @return string
     */
    public function getSupplierName(): ?string
    {
        if (!$this->getIsOpen()) {
            $this->open();
        }

        return $this->supplierName;
    }

    /**
     * @return Product
     */
    public function current(): Product
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
                && $this->xmlReader->depth == 2
                && $this->xmlReader->name == 'PRODUCT') {
                $xmlElement = new SimpleXMLElement($this->xmlReader->readOuterXML());
                $product = new Product();
                $product->fillFromSimpleXMLElement($xmlElement);
                $this->current = $product;
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

        while ($this->xmlReader->read()) {
            if ($this->xmlReader->nodeType == XMLReader::ELEMENT
                && $this->xmlReader->depth == 1
                && $this->xmlReader->name == 'SUPPLIER') {
                $xmlElement = new SimpleXMLElement($this->xmlReader->readOuterXML());
                $this->supplierName = (string)$xmlElement->NAME;
                break;
            }
        }

        $this->isOpen = true;
    }
}
