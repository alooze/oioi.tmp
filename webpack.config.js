//const BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;

const path = require('path')
const fs = require('fs')
const webpack = require('webpack')
const ExtractTextPlugin = require('extract-text-webpack-plugin')
const UglifyJSPlugin = require('uglifyjs-webpack-plugin')
const autoprefixer = require('autoprefixer')
const { basename } = path

const TARGET = process.env.npm_lifecycle_event

const entry = fs.readdirSync('resources/assets/js')
  .filter(path => path.includes('.js'))
  .map(path => basename(path, '.js'))
  .reduce((acc, basename) => Object.assign(acc, {
    [basename]: [`./resources/assets/js/${basename}.js`]
  }), {})

const sassData = "@import '~sass/globals.scss';" // eslint-disable-line

const common = {
  entry,
  output: {
    filename: 'js/[name].bundle.js',
    path: path.resolve(__dirname, 'public'),
    publicPath: '/'
  },
  plugins: [
      //new BundleAnalyzerPlugin()
  ],
  module: {
    rules: [
      {
        test: /\.pug$/,
        loader: 'pug-loader',
        options: {
          pretty: true
        }
      },
      {
        test: /\.(html)$/,
        loader: 'html-loader'
      },
      {
        test: /\.(png|jpg|gif|svg)$/,
        use: [
          {
            loader: 'url-loader',
            options: {
              //limit: 8192,
              name: 'media/[name].[ext]'
            }
          }
        ]
      },
      {
        test: /\.(eot|ttf|otf|woff|woff2)$/,
        loader: 'file-loader',
        options: {
          name: 'media/[name].[ext]'
        }
      }
    ]
  },
  resolve: {
    alias: {
      img: path.resolve(__dirname, 'resources/assets/img'),
      sass: path.resolve(__dirname, 'resources/assets/sass'),
      js: path.resolve(__dirname, 'resources/assets/js')
    }
  }
}



if (TARGET === 'dev') {
  const cssLoader = {
    loader: 'css-loader',
    options: {
      sourceMap: true,
    }
  }
  const sassLoader = {
    loader: 'sass-loader',
    options: {
      sourceMap: true,
      data: sassData
    }
  }
  const entry = Object.entries(common.entry).reduce((acc, [key, val]) => Object.assign(acc, {
    [key]: [...val, 'webpack-hot-middleware/client?reload=true&overlay=true']
  }), {})

  module.exports = Object.assign(common, {
    entry,
    module: Object.assign(common.module, {
      rules: [
        ...common.module.rules,
        {
          test: /\.scss$/,
          use: ['style-loader', cssLoader, sassLoader]
        },
        {
          test: /\.css$/,
          use: ['style-loader', cssLoader]
        }
      ]
    }),
    plugins: [
      ...common.plugins,
      new webpack.HotModuleReplacementPlugin()
    ],
    devtool: 'cheap-module-eval-source-map'
  })
}



if (TARGET === 'build') {
  const fallback = 'style-loader'
  const postLoader = {
    loader: 'postcss-loader',
    options: {
      plugins: [
        autoprefixer({
          browsers:['> 1%', 'last 2 versions']
        })
      ],
      sourceMap: true
    }
  }
  const cssLoader = {
    loader: 'css-loader',
    options: {
      sourceMap: true,
      minimize: true
    }
  }
  const sassLoader = {
    loader: 'sass-loader',
    options: {
      sourceMap: true,
      data: sassData
    }
  }

  module.exports = Object.assign(common, {
    module: Object.assign(common.module, {
      rules: [
        ...common.module.rules,
        {
          test: /\.scss$/,
          use: ExtractTextPlugin.extract({ fallback, use: [ cssLoader, postLoader, sassLoader ] })
        },
        {
          test: /\.css$/,
          use: ExtractTextPlugin.extract({ fallback, use: [ cssLoader, postLoader ] })
        },
        {
          test: /\.js$/,
          exclude: /(node_modules|bower_components)/,
          loader: 'babel-loader'
        }
      ]
    }),
    devtool: 'source-map',
    plugins: [
      ...common.plugins,
      new ExtractTextPlugin('css/[name].css'),
      new UglifyJSPlugin({
        sourceMap: true
      }),
      new webpack.DefinePlugin({
        'process.env': {
          NODE_ENV: JSON.stringify('production')
        }
      })
    ]
  })
}
