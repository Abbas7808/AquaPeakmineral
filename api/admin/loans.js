const fs = require('fs');
const path = require('path');

function readLoans() {
  try {
    const f = path.join(process.cwd(), 'data', 'loans.json');
    if (fs.existsSync(f)) return JSON.parse(fs.readFileSync(f, 'utf8'));
  } catch (e) {}
  return [];
}

module.exports = (req, res) => {
  res.setHeader('Content-Type', 'application/json');
  const loans = readLoans();

  if (req.method === 'GET') {
    return res.status(200).json(loans);
  }

  const body = req.body || {};
  const url = req.url || '';

  if (url.includes('payment') || body.action === 'payment') {
    const accId = body.account_id;
    const amount = parseFloat(body.amount) || 0;
    const acc = loans.find(x => x.id === accId) || {
      id: accId,
      customer_name: 'Customer',
      credit_balance: 0
    };
    acc.credit_balance = Math.max(0, (acc.credit_balance || 0) - amount);
    if (!acc.transactions) acc.transactions = [];
    acc.transactions.unshift({
      id: 'TX-' + Math.floor(1000 + Math.random() * 9000),
      date: new Date().toISOString().slice(0, 10),
      type: 'Payment',
      amount: amount,
      method: body.payment_method || 'Cash',
      note: body.note || 'Payment received'
    });
    return res.status(200).json({ success: true, account: acc });
  }

  if (url.includes('create') || body.action === 'create') {
    const newAcc = {
      id: 'LN-' + (loans.length + 101),
      customer_name: body.customer_name || 'New Enterprise Client',
      contact_person: body.contact_person || '',
      phone: body.phone || '',
      address: body.address || '',
      bottles_held: parseInt(body.bottles_held) || 0,
      security_deposit: parseFloat(body.security_deposit) || 0,
      credit_balance: parseFloat(body.credit_balance) || 0,
      credit_limit: parseFloat(body.credit_limit) || 25000,
      status: 'Normal',
      transactions: []
    };
    return res.status(200).json({ success: true, account: newAcc });
  }

  res.status(200).json(loans);
};
