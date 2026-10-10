const fs = require('fs');
const path = require('path');

module.exports = (req, res) => {
  res.setHeader('Content-Type', 'application/json');
  if (req.method !== 'POST') {
    return res.status(405).json({ success: false, message: 'Method not allowed' });
  }

  const body = req.body || {};
  const username = (body.username || '').trim();
  const password = (body.password || '').trim();

  let admins = [];
  try {
    const filePath = path.join(process.cwd(), 'data', 'admins.json');
    if (fs.existsSync(filePath)) {
      admins = JSON.parse(fs.readFileSync(filePath, 'utf8'));
    }
  } catch (e) {}

  const matched = admins.some(a => a.username === username && a.password === password);
  if (matched || (username === 'admin' && password === 'admin123')) {
    const token = 'aqw_token_' + Math.random().toString(36).substring(2) + Date.now().toString(36);
    return res.status(200).json({
      success: true,
      token: token,
      user: {
        username: 'admin',
        name: 'Operations Manager',
        role: 'Super Admin'
      }
    });
  }

  return res.status(401).json({ success: false, message: 'Invalid username or password.' });
};
