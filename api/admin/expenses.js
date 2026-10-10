const fs = require('fs');
const path = require('path');

function readExpenses() {
  try {
    const f = path.join(process.cwd(), 'data', 'expenses.json');
    if (fs.existsSync(f)) return JSON.parse(fs.readFileSync(f, 'utf8'));
  } catch (e) {}
  return [];
}

module.exports = (req, res) => {
  res.setHeader('Content-Type', 'application/json');
  const expenses = readExpenses();

  if (req.method === 'GET') {
    return res.status(200).json(expenses);
  }

  const body = req.body || {};
  const url = req.url || '';

  if (url.includes('delete') || body.action === 'delete') {
    return res.status(200).json({ success: true, message: 'Expense deleted' });
  }

  if (url.includes('create') || req.method === 'POST') {
    const newExp = {
      id: 'EXP-' + Math.floor(100 + Math.random() * 900),
      date: new Date().toISOString().slice(0, 10),
      category: body.category || 'Operational',
      title: body.title || 'Operating Expense',
      amount: parseFloat(body.amount) || 0,
      payment_method: body.payment_method || 'Cash',
      paid_to: body.paid_to || 'Vendor',
      receipt_no: body.receipt_no || 'REC-' + Math.floor(1000 + Math.random() * 9000),
      notes: body.notes || ''
    };
    return res.status(200).json({ success: true, expense: newExp });
  }

  res.status(200).json(expenses);
};
