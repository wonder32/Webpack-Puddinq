const path = require('path');

// JS Directory path.
const JS_DIR = path.resolve( __dirname, 'assets/javascript/src' );
const BUILD_DIR = path.resolve(__dirname, 'assets/javascript/dist');

const entry = {
    header: JS_DIR + '/header.js',
    footer: JS_DIR + '/footer.js',
};
const output = {
    path: BUILD_DIR,
    filename: '[name].script.js'
};

module.exports = {
    mode: process.env.NODE_ENV === 'production' ? 'production' : 'development',
    entry: entry,
    devtool: 'source-map',
    output: output,
    externals: {
        jquery: 'jQuery'
    },

};