const ordersHandler = require('../orders.js');

module.exports = (req, res) => {
  req.url = '/delete';
  return ordersHandler(req, res);
};
