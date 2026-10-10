module.exports = (req, res) => {
  res.setHeader('Content-Type', 'application/json');
  const body = req.body || {};
  const name = body.customer_name || 'Customer';
  const phone = body.customer_phone || '';
  const address = body.customer_address || '';
  const bottle = body.bottle_name || 'Aqua Water Bottle';
  const qty = body.quantity || 1;
  const total = body.total_price || 280;

  const order_code = 'AQW-' + Math.floor(1000 + Math.random() * 9000);
  const msg = encodeURIComponent(`Hello Aqua Water 🌊💦!\nOrder: *${order_code}*\nItem: *${bottle}* (x${qty})\nName: ${name}\nAddress: ${address}\nTotal: Rs. ${total}`);
  const wa_url = `https://wa.me/923104797444?text=${msg}`;

  res.status(200).json({
    success: true,
    order_code: order_code,
    whatsapp_url: wa_url,
    message: 'Order created successfully!'
  });
};
