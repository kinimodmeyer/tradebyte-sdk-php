<?php

declare(strict_types=1);

namespace Tradebyte\Stock;

use Tradebyte\Base;
use Tradebyte\Client;
use Tradebyte\Stock\Model\StockUpdate;

class StockUpdateTest extends Base
{
    public function testUpdateStock(): void
    {
        $expectedXML = '<TBCATALOG><ARTICLEDATA><ARTICLE><A_NR>1234</A_NR><A_STOCK>5</A_STOCK>'
            . '<A_STOCK identifier="key" key="test">6</A_STOCK>'
            . '<A_STOCK identifier="key" key="test2">7</A_STOCK></ARTICLE></ARTICLEDATA></TBCATALOG>';
        $mockRestClient = $this->getMockBuilder(Client\Rest::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['postXML'])
            ->getMock();
        $mockRestClient->expects($this->once())
            ->method('postXML')
            ->with('articles/stock', $expectedXML);
        $mockClient = $this->getMockBuilder(Client::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['getRestClient'])
            ->getMock();
        $mockClient->expects($this->any())
            ->method('getRestClient')
            ->willReturn($mockRestClient);
        $stockHandler = $mockClient->getStockHandler();
        $stockHandler->updateStock(
            [
                (new StockUpdate())
                ->setArticleNumber('1234')
                ->setStock(5)
                ->addStockForWarehouse('test', 6)
                ->addStockForWarehouse('test2', 7)
            ]
        );
    }

    public function testStockObjectGetRawData(): void
    {
        $stock = new StockUpdate();
        $stock->setStock(20);
        $stock->addStockForWarehouse('warehouse', 20);
        $stock->addStockForWarehouse('warehouse2', 40);
        $stock->setArticleNumber('123456');
        $this->assertSame([
            'article_number' => '123456',
            'stock' => 20,
            'stockForWarehouses' => [
                0 => [
                    'identifier' => 'key',
                    'key' => 'warehouse',
                    'stock' => 20
                ],
                1 => [

                    'identifier' => 'key',
                    'key' => 'warehouse2',
                    'stock' => 40
                ]
            ]
        ], $stock->getRawData());
    }
}
