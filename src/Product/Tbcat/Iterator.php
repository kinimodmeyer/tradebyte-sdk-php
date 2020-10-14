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
