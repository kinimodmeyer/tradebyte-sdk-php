<?php
namespace Tradebyte\Product\Tbcat;

use Tradebyte\Product\Model;
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
                && $this->xmlReader->depth == 2
                && $this->xmlReader->name == 'PRODUCT') {
                $xmlElement = new \SimpleXMLElement($this->xmlReader->readOuterXML());
                $data = [
                    'id' => (string)$xmlElement->P_NR
                ];

                $this->current = new Model($data);
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

        $this->xmlReader = $this->client->getRestClient()->getXML('products', $this->filter);

        parent::rewind();
    }
}
