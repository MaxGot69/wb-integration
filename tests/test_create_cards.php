<?php

require_once __DIR__ . '/../src/Api/Products.php';
require_once __DIR__ . '/../src/Mocks/WbMock.php';

use WbIntegration\Api\Products;
use WbIntegration\Mocks\WbMock;

$config = require __DIR__ . '/../config.php';
$token = $config['wb_token'];

$productsApi = new Products($token);

// Берём фейковые товары из моков
$products = WbMock::getProducts();

// Для теста можно отправить только 5 товаров, чтобы не грузить фейковый сервер
$products = array_slice($products, 0, 5);

$response = $productsApi->createMany($products);

echo "<pre>";
print_r($response);
echo "</pre>";
