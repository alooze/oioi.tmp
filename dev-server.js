var browserSync = require('browser-sync')
var webpack = require('webpack')
var webpackDevMiddleware = require('webpack-dev-middleware')
var webpackHotMiddleware = require('webpack-hot-middleware')

process.env.npm_lifecycle_event = 'dev'

var webpackConfig = require('./webpack.config')
var bundler = webpack(webpackConfig)

browserSync({
  proxy: 'http://localhost:8000',
  middleware: [
    webpackDevMiddleware(bundler, {
      publicPath: webpackConfig.output.publicPath,
      stats: {
        all: false,
        errors: true,
        colors: true
      }
    }),
    webpackHotMiddleware(bundler)
  ],
  files: [
    'resources/views'
  ]
})
