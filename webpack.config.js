const path = require('path');

module.exports = {
    entry: {
        header: './assets/javascript/src/header.js',
        footer: './assets/javascript/src/footer.js'
    },
    output: {
        filename: '[name].script.js',
        path: path.resolve(__dirname, 'assets/javascript/dist'),
    },
    watch: true,
    externals: {
        jquery: 'jQuery'
    }
};