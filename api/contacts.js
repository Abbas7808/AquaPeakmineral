const fs = require('fs');
const path = require('path');

function readContacts() {
  try {
    const f = path.join(process.cwd(), 'data', 'contacts.json');
    if (fs.existsSync(f)) return JSON.parse(fs.readFileSync(f, 'utf8'));
  } catch (e) {}
  return [];
}

module.exports = (req, res) => {
  res.setHeader('Content-Type', 'application/json');
  const contacts = readContacts();

  if (req.method === 'GET') {
    return res.status(200).json(contacts);
  }

  return res.status(200).json({ success: true });
};
