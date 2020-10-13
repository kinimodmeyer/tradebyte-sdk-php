<?php
require 'examples/loader.php';

$client = new Tradebyte\Client(['credentials' => $credentials]);

try {
    $iterator = $client->getStockHandler()->getChannelStockBy(['delta' => $filter['delta'], 'channel' => $filter['channel']]);

    foreach ($iterator as $stock) {
        echo $stock->getArticleNumber().'('.$stock->getStock().')'."\n";
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
