<?php

namespace WbIntegration\Api;

use WbIntegration\Mocks\WbMock;

class Orders{
    public function  fetchAndCreate():array{

        $order = WbMock::getOrder();
//Логика отправки в битрикс
    return [
        'status' => 'created',
        'order_id' => $order['orderId'],
        'customer' => $order['customer']['name'],
        'items_count' => count($order['items']),
        'message' => 'Заказ создан в системе (мок)'
    ];

    }
}