<?php
namespace Tradebyte\Stock;

use Tradebyte\Base;
use Tradebyte\Stock\Model\Stock;

/**
 * @package Tradebyte
 */
class StockTest extends Base
{
    /**
     * @return void
     */
    public function testOrderFillFromXml(): void
    {
        $stock = new Stock();
        $xml = '<?xml version="1.0" encoding="UTF-8"?>
                <ARTICLE>
                    <A_NR>a_nr_test</A_NR>
                    <A_STOCK>2</A_STOCK>
                </ARTICLE>';
        $stock->fillFromSimpleXMLElement(simplexml_load_string($xml));

        $this->assertSame([
            'article_number' => 'a_nr_test',
            'stock' => 2,
        ], $stock->getRawData());
    }

    /**
     * @return void
     */
    public function testStockObjectGetRawData(): void
    {
        $stock = new Stock();
        $stock->setStock(20);
        $stock->setArticleNumber('123456');
        $this->assertSame([
            'article_number' => '123456',
            'stock' => 20,
        ], $stock->getRawData());
    }

}
