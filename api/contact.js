module.exports = (req, res) => {
  res.setHeader('Content-Type', 'application/json');
  res.status(200).json({
    success: true,
    message: 'Thank you! Your message has been received by Aqua Water.'
  });
};
