/* eslint-disable */

var webpack = require('webpack')
var ExtractTextPlugin = require('extract-text-webpack-plugin')

var buildDir = __dirname + '/../src/TemplateBundle/Resources/public'

module.exports = require('./webpack.config.js')

// disable the hot reload
module.exports.entry = [
	'babel-polyfill',
	__dirname + '/' + module.exports.app_root + '/index.js'
]

// export css to a separate file
module.exports.module.loaders[1] = {
	test: /\.scss$/,
	loader: ExtractTextPlugin.extract('css!sass')
}

module.exports.plugins.push(
	new ExtractTextPlugin('../css/main.css')
)
