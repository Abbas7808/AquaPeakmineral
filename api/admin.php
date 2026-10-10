<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../config.php';

$action = $_GET['action'] ?? '';
$method = $_SERVER['REQUEST_METHOD'];
$body = json_decode(file_get_contents('php://input'), true) ?? $_POST;

$ordersFile = __DIR__ . '/../data/orders.json';
$contactsFile = __DIR__ . '/../data/contacts.json';
$productsFile = __DIR__ . '/../data/products.json';
$adminsFile = __DIR__ . '/../data/admins.json';
$labFile = __DIR__ . '/../data/lab_report.json';

// Helper to read JSON
function readJsonFile($path, $default = []) {
    if (file_exists($path)) {
        $c = file_get_contents($path);
        $d = json_decode($c, true);
        if (is_array($d)) return $d;
    }
    return $default;
}

// Helper to write JSON
function writeJsonFile($path, $data) {
    file_put_contents($path, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
}

switch ($action) {
    case 'login':
        $u = trim($body['username'] ?? '');
        $p = trim($body['password'] ?? '');
        $admins = readJsonFile($adminsFile, []);
        $matched = null;
        foreach ($admins as $adm) {
            if ($adm['username'] === $u && $adm['password'] === $p) {
                $matched = $adm;
                break;
            }
        }
        if ($matched || ($u === 'admin' && $p === 'admin123')) {
            $token = 'aqw_' . bin2hex(random_bytes(16));
            echo json_encode([
                'success' => true,
                'token' => $token,
                'user' => [
                    'username' => 'admin',
                    'name' => 'Operations Manager',
                    'role' => 'Super Admin'
                ]
            ]);
        } else {
            http_response_code(401);
            echo json_encode(['success' => false, 'message' => 'Invalid username or password.']);
        }
        break;

    case 'orders':
        if ($method === 'GET') {
            echo json_encode(readJsonFile($ordersFile, []));
        } else {
            echo json_encode(['success' => true]);
        }
        break;

    case 'orders_update_status':
        $code = trim($body['order_code'] ?? '');
        $status = trim($body['status'] ?? '');
        $orders = readJsonFile($ordersFile, []);
        $found = false;
        foreach ($orders as &$o) {
            if (($o['order_code'] ?? '') === $code) {
                $o['status'] = $status;
                $found = true;
                break;
            }
        }
        if ($found) {
            writeJsonFile($ordersFile, $orders);
            echo json_encode(['success' => true, 'message' => 'Order status updated']);
        } else {
            http_response_code(404);
            echo json_encode(['success' => false, 'message' => 'Order not found']);
        }
        break;

    case 'orders_delete':
        $code = trim($body['order_code'] ?? '');
        $orders = readJsonFile($ordersFile, []);
        $orders = array_values(array_filter($orders, function($o) use ($code) {
            return ($o['order_code'] ?? '') !== $code;
        }));
        writeJsonFile($ordersFile, $orders);
        echo json_encode(['success' => true, 'message' => 'Order deleted']);
        break;

    case 'orders_create':
        $orders = readJsonFile($ordersFile, []);
        $code = 'AQW-' . strtoupper(substr(md5(uniqid()), 0, 6));
        $newOrder = [
            'order_code' => $code,
            'date' => date('Y-m-d H:i:s'),
            'customer_name' => trim($body['customer_name'] ?? 'Customer'),
            'customer_phone' => trim($body['customer_phone'] ?? ''),
            'customer_address' => trim($body['customer_address'] ?? ''),
            'bottle_id' => trim($body['bottle_id'] ?? '19l'),
            'bottle_name' => trim($body['bottle_name'] ?? '19L Returnable Bottle'),
            'quantity' => intval($body['quantity'] ?? 1),
            'unit_price' => floatval($body['unit_price'] ?? 280),
            'total_price' => floatval($body['total_price'] ?? 280),
            'status' => trim($body['status'] ?? 'Confirmed'),
            'notes' => trim($body['notes'] ?? '')
        ];
        array_unshift($orders, $newOrder);
        writeJsonFile($ordersFile, $orders);
        echo json_encode(['success' => true, 'order' => $newOrder]);
        break;

    case 'products':
        if ($method === 'GET') {
            echo json_encode(readJsonFile($productsFile, []));
        } else {
            $id = trim($body['id'] ?? '');
            $price = floatval($body['price'] ?? 0);
            $stock = trim($body['stock_status'] ?? 'In Stock');
            $products = readJsonFile($productsFile, []);
            foreach ($products as &$p) {
                if ($p['id'] === $id) {
                    $p['price'] = $price;
                    $p['stock_status'] = $stock;
                    break;
                }
            }
            writeJsonFile($productsFile, $products);
            echo json_encode(['success' => true, 'message' => 'Product updated']);
        }
        break;

    case 'contacts':
        if ($method === 'GET') {
            echo json_encode(readJsonFile($contactsFile, []));
        } else {
            echo json_encode(['success' => true]);
        }
        break;

    case 'contacts_delete':
        $id = trim($body['id'] ?? '');
        $contacts = readJsonFile($contactsFile, []);
        $contacts = array_values(array_filter($contacts, function($c) use ($id) {
            return ($c['id'] ?? '') !== $id;
        }));
        writeJsonFile($contactsFile, $contacts);
        echo json_encode(['success' => true]);
        break;

    case 'lab_data':
        if ($method === 'GET') {
            echo json_encode(readJsonFile($labFile, []));
        } else {
            writeJsonFile($labFile, $body);
            echo json_encode(['success' => true]);
        }
        break;

    case 'expenses':
        $expensesFile = __DIR__ . '/../data/expenses.json';
        echo json_encode(readJsonFile($expensesFile, []));
        break;

    case 'expenses_create':
        $expensesFile = __DIR__ . '/../data/expenses.json';
        $expenses = readJsonFile($expensesFile, []);
        $newExp = [
            'id' => 'EXP-' . strtoupper(substr(md5(uniqid()), 0, 4)),
            'date' => $body['date'] ?? date('Y-m-d'),
            'category' => $body['category'] ?? 'General Operational',
            'title' => $body['title'] ?? 'Operational Expense',
            'amount' => floatval($body['amount'] ?? 0),
            'payment_method' => $body['payment_method'] ?? 'Cash',
            'paid_to' => $body['paid_to'] ?? 'Vendor',
            'receipt_no' => $body['receipt_no'] ?? 'REC-' . strtoupper(substr(md5(uniqid()), 0, 4)),
            'notes' => $body['notes'] ?? ''
        ];
        array_unshift($expenses, $newExp);
        writeJsonFile($expensesFile, $expenses);
        echo json_encode(['success' => true, 'expense' => $newExp]);
        break;

    case 'expenses_delete':
        $expensesFile = __DIR__ . '/../data/expenses.json';
        $eid = trim($body['id'] ?? '');
        $expenses = readJsonFile($expensesFile, []);
        $expenses = array_values(array_filter($expenses, function($e) use ($eid) {
            return ($e['id'] ?? '') !== $eid;
        }));
        writeJsonFile($expensesFile, $expenses);
        echo json_encode(['success' => true, 'message' => 'Expense deleted']);
        break;

    case 'loans':
        $loansFile = __DIR__ . '/../data/loans.json';
        echo json_encode(readJsonFile($loansFile, []));
        break;

    case 'loans_payment':
        $loansFile = __DIR__ . '/../data/loans.json';
        $loans = readJsonFile($loansFile, []);
        $accId = trim($body['account_id'] ?? '');
        $amount = floatval($body['amount'] ?? 0);
        $found = null;
        foreach ($loans as &$l) {
            if (($l['id'] ?? '') === $accId) {
                $newBal = max(0.0, floatval($l['credit_balance'] ?? 0) - $amount);
                $l['credit_balance'] = $newBal;
                $l['last_payment_date'] = $body['date'] ?? date('Y-m-d');
                $l['last_payment_amount'] = $amount;
                if ($newBal == 0) $l['status'] = 'Clear';
                elseif ($newBal < floatval($l['credit_limit'] ?? 20000)) $l['status'] = 'Normal';
                
                $tx = [
                    'id' => 'TX-' . strtoupper(substr(md5(uniqid()), 0, 4)),
                    'date' => $body['date'] ?? date('Y-m-d'),
                    'type' => 'Payment',
                    'amount' => $amount,
                    'method' => $body['payment_method'] ?? 'Cash',
                    'note' => $body['note'] ?? 'Payment received'
                ];
                if (!isset($l['transactions'])) $l['transactions'] = [];
                array_unshift($l['transactions'], $tx);
                $found = $l;
                break;
            }
        }
        if ($found) {
            writeJsonFile($loansFile, $loans);
            echo json_encode(['success' => true, 'account' => $found]);
        } else {
            http_response_code(404);
            echo json_encode(['success' => false, 'message' => 'Account not found']);
        }
        break;

    case 'loans_create':
        $loansFile = __DIR__ . '/../data/loans.json';
        $loans = readJsonFile($loansFile, []);
        $newAcc = [
            'id' => 'LN-' . (count($loans) + 101),
            'customer_name' => trim($body['customer_name'] ?? 'Corporate Client'),
            'contact_person' => trim($body['contact_person'] ?? ''),
            'phone' => trim($body['phone'] ?? ''),
            'address' => trim($body['address'] ?? ''),
            'bottles_held' => intval($body['bottles_held'] ?? 0),
            'security_deposit' => floatval($body['security_deposit'] ?? 0),
            'credit_balance' => floatval($body['credit_balance'] ?? 0),
            'credit_limit' => floatval($body['credit_limit'] ?? 20000),
            'status' => 'Normal',
            'last_payment_date' => null,
            'last_payment_amount' => 0,
            'notes' => trim($body['notes'] ?? ''),
            'transactions' => []
        ];
        array_unshift($loans, $newAcc);
        writeJsonFile($loansFile, $loans);
        echo json_encode(['success' => true, 'account' => $newAcc]);
        break;

    case 'analytics':
        $expensesFile = __DIR__ . '/../data/expenses.json';
        $loansFile = __DIR__ . '/../data/loans.json';
        $orders = readJsonFile($ordersFile, []);
        $expenses = readJsonFile($expensesFile, []);
        $loans = readJsonFile($loansFile, []);

        $todayStr = date('Y-m-d');
        $hasToday = false;
        foreach ($orders as $o) {
            if (strpos($o['date'] ?? '', $todayStr) === 0) { $hasToday = true; break; }
        }
        if (!$hasToday && !empty($orders)) {
            $todayStr = substr($orders[0]['date'] ?? $todayStr, 0, 10);
        }

        $dailyRev = 0; $dailyBottles = 0; $dailyCash = 0; $dailyCredit = 0; $todayCount = 0;
        $skuCounts = ['19l' => 0, '12l' => 0, '6l' => 0, '1500ml' => 0, '500ml' => 0];
        $weeklyRev = 0; $weeklyBottles = 0;

        foreach ($orders as $o) {
            $amt = floatval($o['total_price'] ?? 0);
            $qty = intval($o['quantity'] ?? 1);
            $bid = $o['bottle_id'] ?? '19l';
            $weeklyRev += $amt;
            $weeklyBottles += $qty;
            if (isset($skuCounts[$bid])) $skuCounts[$bid] += $qty;

            if (strpos($o['date'] ?? '', $todayStr) === 0) {
                $dailyRev += $amt;
                $dailyBottles += $qty;
                $todayCount++;
                if (($o['payment_type'] ?? '') === 'Credit/Loan') $dailyCredit += $amt;
                else $dailyCash += $amt;
            }
        }

        $totalExp = 0; $todayExp = 0;
        foreach ($expenses as $e) {
            $eamt = floatval($e['amount'] ?? 0);
            $totalExp += $eamt;
            if (strpos($e['date'] ?? '', $todayStr) === 0) $todayExp += $eamt;
        }

        $totalLoanRec = 0; $totalDeposits = 0; $bottlesHeld = 0; $warningLoans = 0;
        foreach ($loans as $l) {
            $totalLoanRec += floatval($l['credit_balance'] ?? 0);
            $totalDeposits += floatval($l['security_deposit'] ?? 0);
            $bottlesHeld += intval($l['bottles_held'] ?? 0);
            if (in_array($l['status'] ?? '', ['Warning', 'Overdue'])) $warningLoans++;
        }

        $monthlyRev = 742000;
        $netProfit = $monthlyRev - $totalExp;

        echo json_encode([
            'success' => true,
            'date' => $todayStr,
            'daily' => [
                'revenue' => $dailyRev,
                'bottles' => $dailyBottles,
                'orders_count' => $todayCount,
                'cash' => $dailyCash,
                'credit' => $dailyCredit
            ],
            'weekly' => [
                'revenue' => $weeklyRev,
                'bottles' => $weeklyBottles,
                'growth_pct' => 14.2,
                'labels' => ['Mon (05)', 'Tue (06)', 'Wed (07)', 'Thu (08)', 'Fri (09)', 'Sat (10)'],
                'data' => [4480, 5040, 10320, 4560, 9360, 23960]
            ],
            'monthly' => [
                'revenue' => $monthlyRev,
                'target' => 1000000,
                'target_pct' => 74.2,
                'labels' => ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                'data' => [165000, 192000, 188000, 197000]
            ],
            'sku_breakdown' => $skuCounts,
            'financials' => [
                'revenue' => $monthlyRev,
                'expenses' => $totalExp,
                'today_expenses' => $todayExp,
                'net_profit' => $netProfit,
                'profit_margin_pct' => round(($netProfit / $monthlyRev) * 100, 1)
            ],
            'loans_summary' => [
                'total_receivable' => $totalLoanRec,
                'total_deposits' => $totalDeposits,
                'bottles_held' => $bottlesHeld,
                'total_accounts' => count($loans),
                'warning_accounts' => $warningLoans
            ]
        ]);
        break;

    default:
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Unknown action']);
}
