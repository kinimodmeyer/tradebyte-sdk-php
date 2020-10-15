<?php
namespace Tradebyte\Stock;

use Tradebyte\Stock\Model\Stock;
use XMLReader;
use Tradebyte\Base;

/**
 * @package Tradebyte
 */
class Iterator extends Base\Iterator implements \Iterator
{
    /**
     * @return Stock
     */
    public function current(): Stock
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
                && $this->xmlReader->name == 'ARTICLE') {
                $xmlElement = new \SimpleXMLElement($this->xmlReader->readOuterXML());
                $model = new Stock();
                $model->setArticleNumber((string)$xmlElement->A_NR);
                $model->setStock((int)$xmlElement->A_STOCK);
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

        if ($this->openLocalFilepath) {
            $this->xmlReader = new XMLReader();
            $this->xmlReader->open($this->url);
        } else {
            $this->xmlReader = $this->client->getRestClient()->getXML($this->url, $this->filter);
        }

        parent::rewind();
    }
}
