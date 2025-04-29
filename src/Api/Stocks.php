<?php

namespace WbIntegration\Api;

use WbIntegration\Mocks\WbMock;

class Stocks
{
    private string $token;

    public function __construct(string $token)
    {
        $this->token = $token;
    }

    public function sendStocks(): array
    {
        $products = WbMock::getProducts();
        $warehouses = WbMock::getWarehouses();

        $result = [];

        foreach ($warehouses as $warehouse) {
            $warehouseId = $warehouse['id'];

            $stocks = [];
            foreach ($products as $product) {
                $stocks[] = [
                    'sku' => md5($product['name']),
                    'amount' => 1
                ];
            }

            $url = "https://suppliers-api.wildberries.ru/api/v3/stocks/{$warehouseId}";

            $headers = [
                "Authorization: {$this->token}",
                "Content-Type: application/json"
            ];

            $ch = curl_init();

            curl_setopt_array($ch, [
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_HTTPHEADER => $headers,
                CURLOPT_POSTFIELDS => json_encode(['stocks' => $stocks])
            ]);

            $response = curl_exec($ch);

            if (curl_errno($ch)) {
                $error = curl_error($ch);
                curl_close($ch);

                $result[] = [
                    'warehouse_id' => $warehouseId,
                    'success' => false,
                    'error' => $error
                ];
                continue;
            }

            $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            $decodedResponse = json_decode($response, true);

            $result[] = [
                'warehouse_id' => $warehouseId,
                'success' => $httpStatus === 200,
                'http_status' => $httpStatus,
                'response' => $decodedResponse
            ];
        }

        return $result;
    }
}
