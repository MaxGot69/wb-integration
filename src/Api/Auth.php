<?php

namespace WbIntegration\Api;

class Auth{
    private string $token;
    public function __construct(string $token){
        $this->token = $token;
    }

    public function  testConnection():array{

        $url = 'https://suppliers-api.wildberries.ru/api/v3/warehouses'; // Эндпоинт для теста (получение складов)

        $headers = [
            "Authorization: ($this->token)"
        ];

        $ch = curl_init();

        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => $headers,
        ]);

        $responce = curl_exec($ch);
        if($responce === false){
            return [
                'success' => false,
                'error' => curl_error($ch)

            ];
        }
        curl_close($ch);
        return json_decode($responce, true);

    }
}