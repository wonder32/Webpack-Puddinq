const path = require('path'),
    MiniCssExtractPlugin = require('mini-css-extract-plugin'),
    TerserPlugin = require('terser-webpack-plugin'),
    BrowserSyncPlugin = require('browser-sync-webpack-plugin'),
    StyleLintPlugin = require('stylelint-webpack-plugin');

// Paths.
const JS_DIR = path.resolve(__dirname, 'assets/src/js');
const BUILD_DIR = path.resolve(__dirname, 'assets/dist');

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
        jquery: 'jQuery'
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
                            publicPath: '/content/themes/webpack-theme/assets/dist'
                        }
                    },
                    {
                        loader: 'css-loader',
                        //options: { url: false }
                    },
                    'sass-loader'
                ]
            },
            {
                test: /\.(png|jpe?g|gif)$/i,
                use: [{
                    loader: 'file-loader',
                    options: {
                        outputPath: 'images/',
                        name: '[name].[ext]',
                        //emitFile: false
                    }
                },
                'img-loader'
                ]
            }
        ],
    },
    plugins: [
        new StyleLintPlugin({
            files: 'assets/src/scss/**/*.(s(c|a)ss|css)'
        }),
        new MiniCssExtractPlugin({
            filename: 'css/[name].css'
        }),
        new BrowserSyncPlugin({
            host: 'dev.webpack.nl',
            port: 3000,
            files: '**/**.php',
            proxy: 'http://dev.webpack.nl'
        })
    ],
    optimization: {
        minimizer: [
            new TerserPlugin({
                extractComments: true,
            }),
        ],
    }
}