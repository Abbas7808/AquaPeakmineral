const ordersHandler = require('../orders.js');

module.exports = (req, res) => {
  req.url = '/update-status';
  return ordersHandler(req, res);
};
