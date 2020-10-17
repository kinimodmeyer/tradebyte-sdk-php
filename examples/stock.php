<?php
require __DIR__.'/loader.php';

$client = new Tradebyte\Client(['credentials' => $credentials]);
$stockHandler = $client->getStockHandler();
$params = [ 'channel' => $filter['channel'], 'delta' => $filter['delta']];

/*
 * on the fly mode
 */
$catalog = $stockHandler->getTbstock($params);
echo $catalog->getChangeDate();

foreach ($catalog->getStock() as $stock) {
    echo $stock->getStock();
}

$catalog->close();

/*
 * download mode
 */
$stockHandler->downloadTbstock(__DIR__.'/files/stock.xml', $params);
$catalog = $stockHandler->getTbstockLocal(__DIR__.'/files/stock.xml');
echo $catalog->getChangeDate();

foreach ($catalog->getStock() as $stock) {
    echo $stock->getStock();
}

$catalog->close();
