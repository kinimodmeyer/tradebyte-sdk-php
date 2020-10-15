<?php
require __DIR__.'/loader.php';

$client = new Tradebyte\Client(['credentials' => $credentials]);
$stockHandler = $client->getStockHandler();

try {
    $where = ['delta' => $filter['delta'], 'channel' => $filter['channel']];

    /*
     * on the fly
     */
    foreach ($stockHandler->getChannelStockBy($where) as $stock) {
        echo $stock->getArticleNumber().'('.$stock->getStock().')'."\n";
    }

    /*
     * download
     */
    $stockHandler->downloadChannelStockBy(__DIR__.'/files/stock.xml', $where);

    foreach ($stockHandler->openChannelStockFile(__DIR__.'/files/stock.xml') as $stock) {
        echo $stock->getArticleNumber().'('.$stock->getStock().')'."\n";
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
