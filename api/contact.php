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

$name = trim($data['name'] ?? '');
$phone = trim($data['phone'] ?? '');
$email = trim($data['email'] ?? '');
$subject = trim($data['subject'] ?? 'General Inquiry');
$message = trim($data['message'] ?? '');

if (empty($name) || (empty($phone) && empty($email)) || empty($message)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Please provide your name, contact details, and message.']);
    exit;
}

$inquiry = [
    'id' => uniqid('msg_'),
    'date' => date('Y-m-d H:i:s'),
    'name' => $name,
    'phone' => $phone,
    'email' => $email,
    'subject' => $subject,
    'message' => $message
];

$file = __DIR__ . '/../data/contacts.json';
$contacts = [];
if (file_exists($file)) {
    $contacts = json_decode(file_get_contents($file), true) ?? [];
}
$contacts[] = $inquiry;
file_put_contents($file, json_encode($contacts, JSON_PRETTY_PRINT));

echo json_encode([
    'success' => true,
    'message' => 'Thank you! Your message has been received. Our Aqua Water team will contact you shortly.'
]);
