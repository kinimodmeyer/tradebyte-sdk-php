<?php

namespace Tradebyte\Product;

use Tradebyte\Base;
use Tradebyte\Client;
use Tradebyte\Product\Model\Article;
use Tradebyte\Product\Model\Product;

/**
 * @package Tradebyte
 */
class ProductTest extends Base
{
    /**
     * @return mixed[]
     */
    private function getProductFileRawData(): array
    {
        return [
            'id' => 4,
            'number' => 'p_nr_external_test',
            'change_date' => 1602833805,
            'created_date' => 1525245206,
            'sup_supplier' => [
                'identifier' => 'id',
                'key' => 'w',
            ],
            'activations' => [
                'channel_test' => 1
            ],
            'name' => [
                'x-default' => 'p_name_test'
            ],
            'text' => [
                'x-default' => 'p_text_test'
            ],
            'brand' => 'p_brand_test',
            'media' => null,
            'variantfields' => [
                [
                    'identifier' => 'name',
                    'key' => 'Farbe',
                    'value' => 'Farbe',
                ],
                [
                    'identifier' => 'name',
                    'key' => 'Größe',
                    'value' => 'Größe',
                ]
            ],
            'articles' => [
                [
                    'id' => 4,
                    'number' => 'a_nr_test',
                    'sup_supplier' => [
                        'identifier' => 'id',
                        'key' => 'w',
                    ],
                    'change_date' => 1532602476,
                    'created_date' => 1525245321,
                    'active' => true,
                    'ean' => 'a_ean_test',
                    'prod_number' => 'a_prod_nr_test',
                    'variants' => [
                        [
                            'identifier' => 'name',
                            'key' => 'Farbe',
                            'values' => [
                                'x-default' => 'weiß'
                            ]
                        ],
                        [
                            'identifier' => 'name',
                            'key' => 'Größe',
                            'values' => [
                                'x-default' => '40'
                            ]
                        ]
                    ],
                    'prices' => [
                        'channel_test' => [
                            'currency' => 'EUR',
                            'vk' => 27.0,
                            'vk_old' => 0.0,
                            'uvp' => 0.0,
                            'mwst' => 2,
                            'ek' => 12.48
                        ]
                    ],
                    'media' => [
                        [
                            'type' => 'image',
                            'sort' => '10000010',
                            'origname' => '1.jpg',
                            'url' => 'a_media_url_test',
                        ]
                    ],
                    'unit' => 'ST',
                    'stock' => 5,
                    'delivery_time' => 1,
                    'replacement' => 0,
                    'replacement_time' => 0,
                    'order_min' => 0,
                    'order_max' => 0,
                    'order_interval' => 0,
                    'parcel' => [
                        'pieces' => 1,
                        'width' => 35.0,
                        'height' => 5.0,
                        'length' => 23.0
                    ]
                ],
            ]
        ];
    }

    /**
     * @return void
     */
    public function testGetCatalogFromFile(): void
    {
        $productHandler = (new Client())->getProductHandler();
        $catalog = $productHandler->getCatalogFromFile(__DIR__ . '/../files/catalog.xml');
        $products = $catalog->getProducts();
        $products->rewind();

        $this->assertSame(
            [
                'product' => $this->getProductFileRawData(),
                'supplier_name' => 'supplier_name_test'
            ],
            [
                'product' => $products->current()->getRawData(),
                'supplier_name' => $catalog->getSupplierName()
            ]
        );
    }

    /**
     * @return void
     */
    public function testGetProductFromFile(): void
    {
        $productHandler = (new Client())->getProductHandler();
        $productModel = $productHandler->getProductFromFile(__DIR__ . '/../files/product.xml');
        $this->assertSame($this->getProductFileRawData(), $productModel->getRawData());
    }

    /**
     * @return void
     */
    public function testProductObjectGetRawData(): void
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
