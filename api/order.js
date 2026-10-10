const fs = require('fs');
const path = require('path');

const tmpFile = '/tmp/orders.json';
const dataFile = path.join(process.cwd(), 'data', 'orders.json');

function getAllOrders() {
  let list = [];
  try {
    if (fs.existsSync(tmpFile)) {
      list = JSON.parse(fs.readFileSync(tmpFile, 'utf8'));
    } else if (fs.existsSync(dataFile)) {
      list = JSON.parse(fs.readFileSync(dataFile, 'utf8'));
    }
  } catch (e) {
    list = [];
  }
  return list;
}

function saveOrders(list) {
  try {
    fs.writeFileSync(tmpFile, JSON.stringify(list, null, 2), 'utf8');
  } catch (e) {}
  try {
    fs.writeFileSync(dataFile, JSON.stringify(list, null, 2), 'utf8');
  } catch (e) {}
}

module.exports = (req, res) => {
  res.setHeader('Content-Type', 'application/json');

  if (req.method !== 'POST') {
    return res.status(200).json({ success: true, message: 'Aqua Water Orders API' });
  }

  const body = req.body || {};
  const name = body.customer_name || 'Customer';
  const phone = body.customer_phone || '';
  const address = body.customer_address || '';
  const bottle_id = body.bottle_id || '19l';
  const bottle_name = body.bottle_name || 'Aqua Water 19L Bottle';
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

  const orders = getAllOrders();
  orders.unshift(newOrder);
  saveOrders(orders);

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
