<?php

require_once __DIR__ . '/../src/Api/Warehouses.php';

use WbIntegration\Api\Warehouses;

// Подключаем токен
$config = require __DIR__ . '/../config.php';
$token = $config['wb_token'];

$warehouses = new Warehouses($token);
$response = $warehouses->getAll();

echo "<pre>";
print_r($response);
echo "</pre>";
