<?php
namespace Tradebyte\Product;

use Tradebyte\Base;
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
            'articles' => null,
        ], $product->getRawData());
    }

}
