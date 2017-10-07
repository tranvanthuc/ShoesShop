var ExtractTextPlugin = require('extract-text-webpack-plugin');

module.exports = {
    entry: [
      './app/app.module.js',
    ],
    output: {
        path: __dirname + '/public',
        filename: 'app.bundle.js',
    },
    watch: true,
    module: {
        loaders: [
          {
            test: /\.js$/,
            exclude: /node_modules/,
            loader: 'babel-loader',
          },
          {
            test: /\.scss$/,
            loader: ExtractTextPlugin.extract('css-loader!sass-loader')
          },
          { test: /\.html$/, loader: "html-loader" },
      ]
    },
    plugins: [
      new ExtractTextPlugin('./app.bundle.css'),
    ],
    devtool: "#inline-source-map"
}