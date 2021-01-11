const path = require('path'),
    MiniCssExtractPlugin = require('mini-css-extract-plugin'),
    TerserPlugin = require('terser-webpack-plugin'),
    BrowserSyncPlugin = require('browser-sync-webpack-plugin'),
    StyleLintPlugin = require('stylelint-webpack-plugin');

// Paths.
const JS_DIR = path.resolve(__dirname, 'assets/src/js');
const BUILD_DIR = path.resolve(__dirname, 'assets/dist');

// Change edit these
const BUILD_DIR_PUBLIC = '/content/themes/webpack-theme/assets/dist';
const WEBSITE_URL = 'https://dev.puddinq.com';
const SSL_WEBSITE_URL = 'https://dev.puddinq.com';
const SSL_KEY = 'C:\\wamp\\bin\\apache\\apache2.4.46\\conf\\key\\dev.puddinq.comnopass.key';
const SSL_CERT = 'C:\\wamp\\bin\\apache\\apache2.4.46\\conf\\key\\dev.puddinq.com.crt';

module.exports = {
    mode: 'development',
    devtool: 'source-map',
    context: __dirname,
    entry: {
        main: JS_DIR + '/main.js',
        footer: JS_DIR + '/footer.js',
    },
    output: {
        path: BUILD_DIR,
        filename: 'js/[name].js',
    },
    externals: {
        jquery: 'jQuery',
    },
    module: {
        rules: [
            {
                test: /\.jsx?$/,
                loader: 'babel-loader',
            },
            {
                test: /\.s?css$/,
                use: [
                    {
                        loader: MiniCssExtractPlugin.loader,
                        options: {
                            publicPath: BUILD_DIR_PUBLIC,
                        },
                    },
                    {
                        loader: 'css-loader',
                        //options: { url: false }
                    },
                    'sass-loader',
                ],
            },
            {
                test: /\.(png|jpe?g|gif)$/i,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            outputPath: 'images/',
                            name: '[name].[ext]',
                            //emitFile: false
                        },
                    },
                    'img-loader',
                ],
            },
        ],
    },
    plugins: [
        new StyleLintPlugin({
            files: 'assets/src/scss/**/*.(s(c|a)ss|css)',
        }),
        new MiniCssExtractPlugin({
            filename: 'css/[name].css',
        }),
        new BrowserSyncPlugin({
            host: WEBSITE_URL,
            port: 3000,
            files: '**/**.php',
            proxy: SSL_WEBSITE_URL,
            https: {
                key: SSL_KEY,
                cert: SSL_CERT,
            },
        }),
    ],
    optimization: {
        minimizer: [
            new TerserPlugin({
                extractComments: true,
            }),
        ],
    },
};
