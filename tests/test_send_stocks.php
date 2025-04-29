<?php

require_once __DIR__ . '/../src/Api/Stocks.php';
require_once __DIR__ . '/../src/Mocks/WbMock.php';

use WbIntegration\Api\Stocks;
use WbIntegration\Mocks\WbMock;

$config = require __DIR__ . '/../config.php';
$token = $config['wb_token'];

$stocksApi = new Stocks($token);
$response = $stocksApi->sendStocks();

echo "<pre>";
print_r($response);
echo "</pre>";
