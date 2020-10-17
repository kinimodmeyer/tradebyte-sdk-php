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
    public function testOpenChannelStockFile(): void
    {
        $stockHandler = (new Client())->getStockHandler();
        $stock = $stockHandler->openChannelStockFile(__DIR__.'/../files/stock.xml');
        $stock->rewind();
        $stockModel = $stock->current();

        $this->assertSame([
            'article_number' => 'a_nr_test',
            'stock' => 2,
        ], $stockModel->getRawData());
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
