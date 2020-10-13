<?php
namespace Tradebyte\Order;

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

        if ($this->type == 'orderlist') {
            $this->xmlReader = $this->client->getRestClient()->getXML('orders', $this->filter);
        }

        parent::rewind();
    }
}
