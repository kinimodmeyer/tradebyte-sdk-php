<?php
namespace Tradebyte\Stock;

use Tradebyte\Base;
use Tradebyte\Stock\Model\Stock;

/**
 * @package Tradebyte
 */
class StockTest extends Base
{
    public function testStockObjectGetRawData()
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
