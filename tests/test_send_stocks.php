<?php

require_once __DIR__ . '/../src/Mocks/WbMock.php';
require_once __DIR__ . '/../src/Api/Stocks.php';

use WbIntegration\Api\Stocks;

$stocks = new Stocks();
$result = $stocks->send();

echo "<pre>";
print_r(array_slice($result, 0, 5)); // Показываем только первые 5
echo "</pre>";

echo "Остатки переданы по " . count($result) . " товарам.\n";
