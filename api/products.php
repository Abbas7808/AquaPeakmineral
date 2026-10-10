<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../config.php';

echo json_encode([
    'success' => true,
    'brand' => APP_NAME,
    'currency' => APP_CURRENCY,
    'products' => $products
], JSON_PRETTY_PRINT);
