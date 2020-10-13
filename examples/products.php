<?php
require 'examples/loader.php';

$client = new Tradebyte\Client(['credentials' => $credentials]);

if (!empty($filter['channel'])) {
    if (!empty($filter['id'])) {
        try {
            $iterator = $client->getProductHandler()->getProductBy(['channel' => $filter['channel'], 'p_id' => $filter['id']]);

            foreach ($iterator as $product) {
                var_dump($product->getNumber());
            }
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
    } else {
        /*
         * products (care about the rate limiting on tradebyte side)
         */
        try {
            $iterator = $client->getProductHandler()->getProductsBy(['channel' => $filter['channel']]);

            foreach ($iterator as $product) {
                var_dump($product->getNumber());
            }
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
    }
}
