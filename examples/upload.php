<?php
require __DIR__.'/loader.php';

$client = new Tradebyte\Client(['credentials' => $credentials]);
$uploadHandler = $client->getUploaderHandler();
$uploadHandler->uploadFile(__DIR__.'/files/upload.xml', 'test2.xml');
