<?php

require_once __DIR__ . '/../src/Api/Auth.php';

use WbIntegration\Api\Auth;

// Загружаем токен
$config = require __DIR__ . '/../config.php';
$token = $config['wb_token'];

$auth = new Auth($token);
$response = $auth->testConnection();

echo "<pre>";
print_r($response);
echo "</pre>";
