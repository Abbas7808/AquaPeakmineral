<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method Not Allowed']);
    exit;
}

$raw = file_get_contents('php://input');
$data = json_decode($raw, true) ?? $_POST;

$name = trim($data['customer_name'] ?? '');
$phone = trim($data['customer_phone'] ?? '');
$address = trim($data['customer_address'] ?? '');
$bottle_id = trim($data['bottle_id'] ?? '500ml');
$bottle_name = trim($data['bottle_name'] ?? 'Aqua Water');
$quantity = intval($data['quantity'] ?? 1);
$unit_price = floatval($data['unit_price'] ?? 0);

if (empty($name) || empty($phone) || empty($address)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Please provide your name, phone number, and delivery address.']);
    exit;
}

$order_code = 'AQW-' . strtoupper(substr(md5(uniqid()), 0, 6));
$order = [
    'order_code' => $order_code,
    'date' => date('Y-m-d H:i:s'),
    'customer_name' => $name,
    'customer_phone' => $phone,
    'customer_address' => $address,
    'bottle_id' => $bottle_id,
    'bottle_name' => $bottle_name,
    'quantity' => $quantity,
    'unit_price' => $unit_price,
    'total_price' => $unit_price * $quantity,
    'status' => 'Pending Confirmation'
];

$file = __DIR__ . '/../data/orders.json';
$orders = [];
if (file_exists($file)) {
    $orders = json_decode(file_get_contents($file), true) ?? [];
}
$orders[] = $order;
file_put_contents($file, json_encode($orders, JSON_PRETTY_PRINT));

$whatsapp_msg = "Hello Aqua Water 🌊💦!%0A" .
                "Order Confirmation Code: *{$order_code}*%0A" .
                "Product: *{$bottle_name}* (Qty: {$quantity})%0A" .
                "Name: {$name}%0A" .
                "Phone: {$phone}%0A" .
                "Address: {$address}%0A" .
                "Total: Rs. " . number_format($unit_price * $quantity) . "%0A%0A" .
                "Please confirm my delivery schedule.";

$whatsapp_url = "https://wa.me/" . APP_WHATSAPP . "?text=" . $whatsapp_msg;

echo json_encode([
    'success' => true,
    'message' => 'Order placed successfully!',
    'order_code' => $order_code,
    'order' => $order,
    'whatsapp_url' => $whatsapp_url
]);
