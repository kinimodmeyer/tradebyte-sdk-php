<?php
namespace Tradebyte\Stock;

use Tradebyte\Base;
use Tradebyte\Client;
use Tradebyte\Stock\Model\Stock;

/**
 * @package Tradebyte
 */
class StockTest extends Base
{
    /**
     * @return void
     */
    public function testOpenTbstockLocal(): void
    {
        $stockHandler = (new Client())->getStockHandler();
        $catalog = $stockHandler->getTbstockLocal(__DIR__.'/../files/stock.xml');
        $stockIterator = $catalog->getStock();
        $stockIterator->rewind();
        $stockModel = $stockIterator->current();

        $this->assertSame([
            'article_number' => 'a_nr_test',
            'stock' => 2,
        ], $stockModel->getRawData());

        $this->assertEquals('1602870040', $catalog->getChangeDate());
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
