<?php

require_once __DIR__ . '/../src/Mocks/WbMock.php';
require_once __DIR__ . '/../src/Api/Orders.php';

use WbIntegration\Api\Orders;

$orders = new Orders();
$result = $orders->fetchAndCreate();

echo "<pre>";
print_r($result);
echo "</pre>";
