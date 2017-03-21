/* eslint-disable */

var webpack = require('webpack')

module.exports = require('./webpack.config.js')

var buildDir = __dirname + '/../src/TemplateBundle/Resources/public'

// disable the hot reload
module.exports.entry = [
	'babel-polyfill',
	__dirname + '/' + module.exports.app_root + '/index.js'
]

// production env
module.exports.plugins.push(
	new webpack.DefinePlugin({
		'process.env': {
			NODE_ENV: JSON.stringify('production'),
		}
	})
)

// compress the js file
module.exports.plugins.push(
	new webpack.optimize.UglifyJsPlugin({
		comments: false,
		compressor: {
			warnings: false
		}
	})
)