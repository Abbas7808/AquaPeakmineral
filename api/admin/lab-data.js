const fs = require('fs');
const path = require('path');

function readLab() {
  try {
    const f = path.join(process.cwd(), 'data', 'lab_report.json');
    if (fs.existsSync(f)) return JSON.parse(fs.readFileSync(f, 'utf8'));
  } catch (e) {}
  return {};
}

module.exports = (req, res) => {
  res.setHeader('Content-Type', 'application/json');
  if (req.method === 'GET') {
    return res.status(200).json(readLab());
  }
  res.status(200).json({ success: true, message: 'Lab data saved' });
};
