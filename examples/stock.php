<?php
require __DIR__.'/loader.php';

$client = new Tradebyte\Client(['credentials' => $credentials]);
$stockHandler = $client->getStockHandler();
$params = [ 'channel' => $filter['channel'], 'delta' => $filter['delta']];

/*
 * on the fly mode
 */
$catalog = $stockHandler->getStockList($params);
echo $catalog->getChangeDate();

foreach ($catalog->getStock() as $stock) {
    echo $stock->getStock();
}

$catalog->close();

/*
 * download mode
 */
$stockHandler->downloadStockList(__DIR__.'/files/stock.xml', $params);
$catalog = $stockHandler->getStockListFromFile(__DIR__.'/files/stock.xml');
echo $catalog->getChangeDate();

foreach ($catalog->getStock() as $stock) {
    echo $stock->getStock();
}

$catalog->close();

/*
 * update stock
 */
$stockHandler->updateStock([
    (new Tradebyte\Stock\Model\Stock())->setArticleNumber('12345')->setStock(6)
]);
