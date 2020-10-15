<?php
require __DIR__.'/loader.php';

$client = new Tradebyte\Client(['credentials' => $credentials]);
$productHandler = $client->getProductHandler();

if (!empty($filter['channel'])) {
    if (!empty($filter['id'])) {
        try {
            /*
             * on the fly mode
             */
            $productModel = $productHandler->getProductById($filter['id'], $filter['channel']);
            echo $productModel->getId()."\n";

            /*
             * download mode
             */
            $productHandler->downloadProductById(__DIR__.'/files/product_'.$filter['id'].'.xml', $filter['id'], $filter['channel']);
            $productModel = $productHandler->openProductFile(__DIR__.'/files/product_'.$filter['id'].'.xml');
            echo $productModel->getId()."\n";
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    } else {
        /*
         * products (care about the rate limiting on tradebyte side)
         */

        try {
            /*
             * on the fly mode
             */
            $iterator = $productHandler->getProductsBy(['channel' => $filter['channel']]);

            foreach ($iterator as $product) {
                var_dump($product->getId());
            }

            /*
             * download mode
             */
            $productHandler->downloadProductsBy(__DIR__.'/files/products.xml', ['channel' => $filter['channel']]);

            foreach ($productHandler->openProductsFile(__DIR__.'/files/products.xml') as $product) {
                echo $product->getId()."\n";
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
