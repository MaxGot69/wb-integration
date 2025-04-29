<?php

require_once __DIR__ . '/../src/Api/Orders.php';

use WbIntegration\Api\Orders;

// Подключаем токен
$config = require __DIR__ . '/../config.php';
$token = $config['wb_token'];

// Получаем POST-данные (в реальности WB шлёт JSON)
$postData = file_get_contents('php://input');
$data = json_decode($postData, true);

// Тут WB обычно шлёт ID заказа
if (!isset($data['orderId'])) {
    http_response_code(400);
    echo json_encode(['error' => 'orderId not found']);
    exit;
}

// Создаём экземпляр для работы с заказами
$orderApi = new Orders($token);

// Запрашиваем полную информацию о заказе
$orderInfo = $orderApi->getOrderInfo($data['orderId']);

// Ответим серверу (WB обычно ждёт 200 OK)
http_response_code(200);
echo json_encode([
    'message' => 'Order processed',
    'order_info' => $orderInfo
]);
