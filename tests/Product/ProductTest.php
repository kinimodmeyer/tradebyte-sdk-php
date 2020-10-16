<?php
namespace Tradebyte\Product;

use Tradebyte\Base;
use Tradebyte\Product\Model\Article;
use Tradebyte\Product\Model\Product;

/**
 * @package Tradebyte
 */
class ProductTest extends Base
{
    public function testProductObjectGetRawData()
    {
        $product = new Product();
        $product->setId(1);

        $article = new Article();
        $article->setId(1);
        $product->setArticles([$article]);
        $this->assertSame([
            'id' => 1,
            'number' => null,
            'change_date' => null,
            'created_date' => null,
            'sup_supplier' => null,
            'activations' => null,
            'name' => null,
            'text' => null,
            'brand' => null,
            'media' => null,
            'variantfields' => null,
            'articles' => [
                [
                    'id' => 1,
                    'number' => null,
                    'sup_supplier' => null,
                    'change_date' => null,
                    'created_date' => null,
                    'active' => null,
                    'ean' => null,
                    'prod_number' => null,
                    'variants' => null,
                    'prices' => null,
                    'media' => null,
                    'unit' => null,
                    'stock' => null,
                    'delivery_time' => null,
                    'replacement' => null,
                    'replacement_time' => null,
                    'order_min' => null,
                    'order_max' => null,
                    'order_interval' => null,
                    'parcel' => null,
                ]
            ],
        ], $product->getRawData());
    }

}
