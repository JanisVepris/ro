/* eslint-disable */

var webpack = require('webpack')

var buildDir = __dirname + '/../src/TemplateBundle/Resources/public'

module.exports = require('./webpack.config.js')

// disable the hot reload
module.exports.entry = [
	'babel-polyfill',
	__dirname + '/' + module.exports.app_root + '/index.js'
]