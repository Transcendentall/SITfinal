var path = require('path');

module.exports = {
  entry: ['./javascript/first.js', './javascript/second.js', './javascript/third.js'],
  output: {
    filename: 'bundle.js',
    path: path.resolve(__dirname, 'dist')
  }
};