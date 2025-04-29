<?php

namespace WbIntegration\Api;

class Products
{
    private string $token;

    public function __construct(string $token)
    {
        $this->token = $token;
    }

    public function createMany(array $products): array
    {
        $url = 'https://suppliers-api.wildberries.ru/api/v3/products/import';

        $headers = [
            "Authorization: {$this->token}",
            "Content-Type: application/json"
        ];

        $data = [
            'cards' => $products
        ];

        $ch = curl_init();

        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_POSTFIELDS => json_encode($data)
        ]);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            $error = curl_error($ch);
            curl_close($ch);

            return [
                'success' => false,
                'error' => $error
            ];
        }

        $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $result = json_decode($response, true);

        if ($httpStatus !== 200) {
            return [
                'success' => false,
                'http_status' => $httpStatus,
                'response' => $result
            ];
        }

        return [
            'success' => true,
            'data' => $result
        ];
    }
}
