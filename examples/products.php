<?php
require __DIR__.'/loader.php';

$client = new Tradebyte\Client(['credentials' => $credentials]);

if (!empty($filter['channel'])) {
    if (!empty($filter['id'])) {
        try {
            $productModel = $client->getProductHandler()->getProductById($filter['id'], $filter['channel']);
            var_dump($productModel->getId(), $productModel->getRawData());
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    } else {
        /*
         * products (care about the rate limiting on tradebyte side)
         */
        try {
            $iterator = $client->getProductHandler()->getProductsBy(['channel' => $filter['channel']]);

            foreach ($iterator as $product) {
                var_dump($product->getId());
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
