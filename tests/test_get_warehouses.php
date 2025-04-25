<?php

require_once __DIR__ . '/../src/Mocks/WbMock.php';
require_once __DIR__ . '/../src/Api/Warehouses.php';

use WbIntegration\Api\Warehouses;

$warehouses = new Warehouses();
$data = $warehouses->getAll();

echo "<pre>";
print_r($data);
echo "</pre>";
