<?php

namespace WbIntegration\Api;

use WbIntegration\Mocks\WbMock;

class Products{
    public function createMany():array{
        $products = WbMock::getProducts();

        //
        $created = [];

        foreach ($products as $product){
            $created[] = [
                'name' => $product['name'],
                'status' => 'created',
                'message' => 'Карточка создана(мок)'
            ];
        }
        return $created;

    }
}