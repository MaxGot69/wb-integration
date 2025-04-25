<?php

require_once __DIR__ . '/../src/Mocks/WbMock.php';
require_once __DIR__ . '/../src/Api/Products.php';

use WbIntegration\Api\Products;

$products = new Products();
$result = $products->createMany();

echo "<pre>";
print_r(array_slice($result, 0, 5)); // Показываем только первые 5 карточек
echo "</pre>";

echo "Всего карточек создано: " . count($result) . "\n";
