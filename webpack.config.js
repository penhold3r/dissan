//
require('whatwg-fetch');
//
const path = require('path');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const globImporter = require('node-sass-glob-importer');
//
module.exports = {
   entry: ['whatwg-fetch', './scripts/index.js'],
   output: {
      filename: 'js/bundle.dissan.js',
      path: path.resolve(__dirname, './dissan/'),
      publicPath: './'
   },
   module: {
      rules: [
         {
            test: /\.js$/,
            loader: 'babel-loader',
            include: path.resolve(__dirname, './scripts'),
            exclude: /node_modules/
         },
         {
            test: /\.(s?css)$/,
            use: [
               {
                  loader: MiniCssExtractPlugin.loader,
                  options: {}
               },
               {
                  loader: 'css-loader',
                  options: {}
               },
               {
                  loader: 'postcss-loader',
                  options: {
                     plugins: () => [require('autoprefixer')]
                  }
               },
               {
                  loader: 'sass-loader',
                  options: {
                     importer: globImporter()
                  }
               }
            ]
         },
         {
            test: /\.(png|jpe?g|gif|svg)$/,
            use: [
               {
                  loader: 'file-loader',
                  options: {
                     name: '[name].[hash:12].[ext]',
                     outputPath: 'css/img',
                     publicPath: './img'
                  }
               }
            ]
         },
         {
            test: /\.(eot|svg|ttf|woff|woff2)$/,
            use: [
               {
                  loader: 'url-loader',
                  options: {
                     name: '[name].[ext]',
                     outputPath: 'css/fonts',
                     publicPath: './fonts'
                  }
               }
            ]
         }
      ]
   },
   plugins: [
      new MiniCssExtractPlugin({
         filename: 'css/style.dissan.css',
      })
   ]
};
