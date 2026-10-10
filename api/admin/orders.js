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
  let orders = getAllOrders();

  if (req.method === 'GET') {
    return res.status(200).json(orders);
  }

  const body = req.body || {};
  const url = req.url || '';

  // Delete action
  if (url.includes('delete') || body.action === 'delete') {
    const code = body.order_code;
    orders = orders.filter(o => o.order_code !== code);
    saveOrders(orders);
    return res.status(200).json({ success: true, message: `Order ${code} deleted` });
  }

  // Update Status / Receive Order action
  if (url.includes('update-status') || body.action === 'update-status' || body.status) {
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
      saveOrders(orders);
      return res.status(200).json({ success: true, message: `Order ${code} status updated to ${newStatus}` });
    } else {
      return res.status(404).json({ success: false, message: 'Order not found' });
    }
  }

  // Create Manual Order
  if (url.includes('create') || req.method === 'POST') {
    const newOrder = {
      order_code: 'AQW-' + Math.floor(1000 + Math.random() * 9000),
      date: new Date().toISOString().replace('T', ' ').substring(0, 19),
      status: 'Confirmed',
      ...body
    };
    orders.unshift(newOrder);
    saveOrders(orders);
    return res.status(200).json({ success: true, order: newOrder });
  }

  return res.status(200).json(orders);
};
