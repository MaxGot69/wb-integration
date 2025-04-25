<?php

namespace WbIntegration\Api;

use WbIntegration\Mocks\WbMock;

class Stocks{

    public function send(): array{
        $products = WbMock::getProducts();
        $warehouses = WbMock::getWarehouses();

        //ID первого скл
        $warehouseID = $warehouses[0]['id'];
        $result = [];

        foreach ($products as $product ){
            $result[] = [
                'product' => $product['name'],
                'warehouse_id' => $warehouseID,
                'stock' => 1,
                'status' => 'ok',
                'message' => 'Остаток передан(мок)'
            ];
        }
        return $result;
    }
}