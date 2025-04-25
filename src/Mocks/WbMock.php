<?php
namespace WbIntegration\Mocks;

class WbMock{

    public static function getWarehouses():array{

        return [
            [
                'id' => 123456,
                'name' => 'Склад Москва',
                'isFbs' => true
            ],
            [

            'id' => '789012',
            'name' => 'Склад СПб',
            'isFbs' => true
            ]
        ];
    
    }

    public static function getOrder():array{
        return [
            'orderId' => 987654321,
            'date' => '2025-04-24T14:00:00Z',
            'status' => 'confirmed',
            'items' => [
                [

                'sku' => 'ABC123',
                'name' => 'Тестовый товар',
                'quantity' => 1,
                'price' => 999
            ]
            ],
            'customer' => [
                'name' => 'Иванов Иван',
                'address' => 'ул. Приморская, д. 1',
                'phone' => '+79001234567'
            ]
            ];
            
    }

    public static function getProducts():array{

        $products = [];

        for ($i = 1; $i <= 300; $i++){

            $products[]= [
                'name' => "Товар №$i",
                'price' => rand(500, 3000),
                'photo' => "https://example.com/images/product$i.jpg",
                'characteristics' => [
                    'Цвет' => 'Черный',
                    'Материал' => 'Пластик',
                    'Вес' => rand(100, 1000) . ' r'
                ]
                ];
        }
        return $products;
    }

}
