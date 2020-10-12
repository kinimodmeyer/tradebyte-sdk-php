<?php
namespace Tradebyte\Order;

use XMLReader;

/**
 * @package Tradebyte
 */
class Iterator implements \Iterator
{
    /**
     * @var XMLReader
     */
    private $xmlReader;

    /**
     * @var Model
     */
    private $current;

    /**
     * @param XMLReader $xml
     */
    public function __construct(XMLReader $xml)
    {
        $this->xmlReader = $xml;
    }

    /**
     * @return Model
     */
    public function current()
    {
        return $this->current;
    }

    /**
     * @return bool
     */
    public function valid()
    {
        while ($this->xmlReader->read()) {
            if ($this->xmlReader->nodeType == XMLReader::ELEMENT && $this->xmlReader->name == 'ORDER') {
                $xmlElement = new \SimpleXMLElement($this->xmlReader->readOuterXML());
                $data = [
                    'id' => (int)$xmlElement->ORDER_DATA->TB_ID,
                    'order_date' => (string)$xmlElement->ORDER_DATA->ORDER_DATE,
                    'date_created' => (string)$xmlElement->ORDER_DATA->DATE_CREATED,
                    'channel_sign' => (string)$xmlElement->ORDER_DATA->CHANNEL_SIGN,
                    'channel_id' => (string)$xmlElement->ORDER_DATA->CHANNEL_ID,
                    'channel_number' => (string)$xmlElement->ORDER_DATA->CHANNEL_NO,
                    'paid' => (bool)$xmlElement->ORDER_DATA->PAID,
                    'approved' => (bool)$xmlElement->ORDER_DATA->APPROVED,
                    'item_count' => (int)$xmlElement->ORDER_DATA->ITEM_COUNT,
                    'total_item_amount' => (float)$xmlElement->ORDER_DATA->TOTAL_ITEM_AMOUNT
                ];

                $this->current = new Model($data);
                return true;
            }
        }

        return false;
    }

    public function next()
    {
        // TODO: Implement method.
    }

    public function key()
    {
        // TODO: Implement method.
    }

    public function rewind()
    {
        // TODO: Implement method.
    }
}
