<?php
require __DIR__.'/loader.php';

$client = new Tradebyte\Client(['credentials' => $credentials]);
$productHandler = $client->getProductHandler();

if (isset($filter['id'])) {
    echo $productHandler->getProduct($filter['id'], $filter['channel'])->getId();
    $productHandler->downloadProduct(__DIR__.'/files/product_'.$filter['id'].'.xml', $filter['id'], $filter['channel']);
    echo $productHandler->getProductLocal(__DIR__.'/files/product_'.$filter['id'].'.xml')->getId();
} else {
    /*
     * on the fly mode
     */
    $catalog = $productHandler->getTbcat(['channel' => $filter['channel']]);
    echo $catalog->getSupplierName();

    foreach ($catalog->getProducts() as $product) {
        echo $product->getId();
    }

    $catalog->close();

    /*
     * download mode
     */
    $productHandler->downloadTbcat(__DIR__.'/files/products.xml', ['channel' => $filter['channel']]);
    $catalog = $productHandler->getTbcatLocal(__DIR__.'/files/products.xml');
    echo $catalog->getSupplierName();

    foreach ($catalog->getProducts() as $product) {
        echo $product->getId();
    }

    $catalog->close();
}
