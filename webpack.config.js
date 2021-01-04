const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const webpack = require('webpack');

// JS Directory path.
const JS_DIR = path.resolve( __dirname, 'assets/src/js' );
const STYLE_DIR = path.resolve( __dirname, 'assets/src/scss' );
const BUILD_DIR = path.resolve(__dirname, 'assets/dist');

// Files to convert
const entry = {
    header: JS_DIR + '/header.js',
    footer: JS_DIR + '/footer.js',
    style: STYLE_DIR + '/style.scss',
};

// output path and filename for js files
const output = {
    path: BUILD_DIR,
    filename: 'js/[name].script.js',
};

// output folder/name for css files is different from js
const plugins = [
    new MiniCssExtractPlugin({
        // Options similar to the same options in webpackOptions.output
        // both options are optional
        filename: 'css/[name].css',
    }),
];


module.exports = {
    mode: process.env.NODE_ENV === 'production' ? 'production' : 'development',
    entry: entry,
    devtool: 'source-map',
    output: output,
    externals: {
        jquery: 'jQuery'
    },
    plugins: plugins,
    module: {
        rules: [
            {
                test: /\.(sa|sc|c)ss$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                    'postcss-loader',
                    'sass-loader',
                ],
            },
        ],
    },
    optimization: {
        removeEmptyChunks: true,
    },
};