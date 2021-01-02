const path = require('path');

module.exports = {
    entry: './assets/javascript/src/script.js',
    output: {
        filename: 'script.js',
        path: path.resolve(__dirname, 'assets/javascript/dist'),
    },
    watch: true,
    externals: {
        jquery: 'jQuery'
    }
};