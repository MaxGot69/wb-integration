<?php

namespace WbIntegration\Api;

use WbIntegration\Mocks\WbMock;

class Warehouses
{
    public function getAll(): array
    {
        return WbMock::getWarehouses();
    }
}
