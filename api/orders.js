const fs = require('fs');
const path = require('path');

function readOrders() {
  try {
    const f = path.join(process.cwd(), 'data', 'orders.json');
    if (fs.existsSync(f)) return JSON.parse(fs.readFileSync(f, 'utf8'));
  } catch (e) {}
  return [];
}

module.exports = (req, res) => {
  res.setHeader('Content-Type', 'application/json');
  const orders = readOrders();

  if (req.method === 'GET') {
    return res.status(200).json(orders);
  }

  const body = req.body || {};
  const url = req.url || '';

  if (url.includes('delete') || body.action === 'delete') {
    const code = body.order_code;
    return res.status(200).json({ success: true, message: 'Order deleted' });
  }

  if (url.includes('update-status') || body.action === 'update-status') {
    return res.status(200).json({ success: true, message: 'Status updated' });
  }

  if (url.includes('create') || req.method === 'POST') {
    const newOrder = {
      order_code: 'AQW-' + Math.floor(1000 + Math.random() * 9000),
      date: new Date().toISOString().replace('T', ' ').substring(0, 19),
      ...body
    };
    return res.status(200).json({ success: true, order: newOrder });
  }

  res.status(200).json(orders);
};
