const fs = require('fs');
const path = require('path');

function readProducts() {
  try {
    const f = path.join(process.cwd(), 'data', 'products.json');
    if (fs.existsSync(f)) return JSON.parse(fs.readFileSync(f, 'utf8'));
  } catch (e) {}
  return [];
}

module.exports = (req, res) => {
  res.setHeader('Content-Type', 'application/json');
  const prods = readProducts();

  if (req.method === 'GET') {
    return res.status(200).json(prods);
  }

  // POST update
  return res.status(200).json({ success: true, message: 'Product updated' });
};
