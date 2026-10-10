const fs = require('fs');
const path = require('path');

const tmpFile = '/tmp/orders.json';
const dataFile = path.join(process.cwd(), 'data', 'orders.json');
const altDataFile = path.join(__dirname, '..', 'data', 'orders.json');

// In-memory cache shared across invocations in warm lambda container
if (!global.__aquaOrdersCache) {
  global.__aquaOrdersCache = null;
}

function loadOrders() {
  if (global.__aquaOrdersCache && Array.isArray(global.__aquaOrdersCache) && global.__aquaOrdersCache.length > 0) {
    return global.__aquaOrdersCache;
  }

  let list = [];
  try {
    if (fs.existsSync(tmpFile)) {
      list = JSON.parse(fs.readFileSync(tmpFile, 'utf8'));
    }
    if ((!list || list.length === 0) && fs.existsSync(dataFile)) {
      list = JSON.parse(fs.readFileSync(dataFile, 'utf8'));
    }
    if ((!list || list.length === 0) && fs.existsSync(altDataFile)) {
      list = JSON.parse(fs.readFileSync(altDataFile, 'utf8'));
    }
  } catch (e) {
    list = [];
  }

  global.__aquaOrdersCache = list;
  return list;
}

function persistOrders(list) {
  global.__aquaOrdersCache = list;
  try {
    fs.writeFileSync(tmpFile, JSON.stringify(list, null, 2), 'utf8');
  } catch (e) {}
  try {
    fs.writeFileSync(dataFile, JSON.stringify(list, null, 2), 'utf8');
  } catch (e) {}
}

module.exports = (req, res) => {
  res.setHeader('Content-Type', 'application/json');
  res.setHeader('Access-Control-Allow-Origin', '*');
  res.setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS');
  res.setHeader('Access-Control-Allow-Headers', 'Content-Type');

  if (req.method === 'OPTIONS') {
    return res.status(200).end();
  }

  let orders = loadOrders();

  // 1. GET Orders List (Admin ERP & Storefront order tracking)
  if (req.method === 'GET') {
    return res.status(200).json(orders);
  }

  const body = req.body || {};
  const url = req.url || '';
  const action = body.action || '';

  // 2. Admin Action: Delete Order
  if (url.includes('delete') || action === 'delete') {
    const code = body.order_code;
    orders = orders.filter(o => o.order_code !== code);
    persistOrders(orders);
    return res.status(200).json({ success: true, message: `Order ${code} deleted` });
  }

  // 3. Admin Action: Receive / Update Order Status
  if (url.includes('update-status') || action === 'update-status' || (body.status && body.order_code && action !== 'create')) {
    const code = body.order_code;
    const newStatus = body.status || 'Confirmed';
    let found = false;

    for (let o of orders) {
      if (o.order_code === code) {
        o.status = newStatus;
        if (body.assigned_van) o.assigned_van = body.assigned_van;
        if (body.delivery_slot) o.delivery_slot = body.delivery_slot;
        if (body.notes) o.notes = body.notes;
        o.received_at = new Date().toISOString().replace('T', ' ').substring(0, 19);
        found = true;
        break;
      }
    }

    if (found) {
      persistOrders(orders);
      return res.status(200).json({
        success: true,
        message: `Order ${code} marked as ${newStatus} and received!`,
        order: orders.find(x => x.order_code === code)
      });
    } else {
      // If order was created in client localStorage and not yet on server, create/receive it now
      const receivedOrder = {
        order_code: code,
        date: new Date().toISOString().replace('T', ' ').substring(0, 19),
        status: newStatus,
        assigned_van: body.assigned_van || 'Van 1 - Islamabad Routes',
        delivery_slot: body.delivery_slot || 'Standard Route',
        customer_name: body.customer_name || 'Customer',
        customer_phone: body.customer_phone || '03344739339',
        customer_address: body.customer_address || 'Address not specified',
        bottle_name: body.bottle_name || '19L Returnable Bottle',
        quantity: body.quantity || 1,
        total_price: body.total_price || 280,
        payment_type: body.payment_type || 'Cash on Delivery',
        received_at: new Date().toISOString().replace('T', ' ').substring(0, 19)
      };
      orders.unshift(receivedOrder);
      persistOrders(orders);
      return res.status(200).json({
        success: true,
        message: `Order ${code} created and received as ${newStatus}`,
        order: receivedOrder
      });
    }
  }

  // 4. Admin Action: Manual Order Creation
  if (url.includes('create') || action === 'create') {
    const newOrder = {
      order_code: 'AQW-M' + Math.floor(1000 + Math.random() * 9000),
      date: new Date().toISOString().replace('T', ' ').substring(0, 19),
      status: 'Confirmed',
      ...body
    };
    orders.unshift(newOrder);
    persistOrders(orders);
    return res.status(200).json({ success: true, order: newOrder });
  }

  // 5. Storefront Customer Order Placement (POST /api/order)
  const name = body.customer_name || 'Customer';
  const phone = body.customer_phone || '';
  const address = body.customer_address || '';
  const bottle_id = body.bottle_id || '19l';
  const bottle_name = body.bottle_name || '19L Returnable Bottle';
  const qty = parseInt(body.quantity) || 1;
  const unit_price = parseFloat(body.unit_price) || 280;
  const total = parseFloat(body.total_price) || (unit_price * qty);
  const payment_type = body.payment_type || 'Cash on Delivery';
  const delivery_slot = body.delivery_slot || 'Standard Route (Within 2-4 Hours)';
  const notes = body.notes || 'Website Online Order';

  const order_code = 'AQW-W' + Math.floor(1000 + Math.random() * 9000);
  const dateStr = new Date().toISOString().replace('T', ' ').substring(0, 19);

  const newOrder = {
    order_code: order_code,
    date: dateStr,
    customer_name: name,
    customer_phone: phone,
    customer_address: address,
    bottle_id: bottle_id,
    bottle_name: bottle_name,
    quantity: qty,
    unit_price: unit_price,
    total_price: total,
    payment_type: payment_type,
    delivery_slot: delivery_slot,
    status: 'Pending Confirmation',
    notes: notes,
    source: 'Website Online Order'
  };

  orders.unshift(newOrder);
  persistOrders(orders);

  const msg = encodeURIComponent(`Hello Aqua Water 🌊💦!\nI placed an order on your website:\n*Order Code:* ${order_code}\n*Item:* ${bottle_name} (x${qty})\n*Name:* ${name}\n*Phone:* ${phone}\n*Address:* ${address}\n*Total:* Rs. ${total}\n\nPlease confirm delivery timing.`);
  const wa_url = `https://wa.me/923344739339?text=${msg}`;

  return res.status(200).json({
    success: true,
    order_code: order_code,
    order: newOrder,
    whatsapp_url: wa_url,
    message: 'Order created successfully and waiting for admin reception!'
  });
};
