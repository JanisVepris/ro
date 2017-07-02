/* eslint-disable */
const path = require('path')
const CleanWebpackPlugin = require('clean-webpack-plugin')
const webpack = require('webpack')
const fs = require('fs')

const buildDir = __dirname + '/../web'

fs.accessSync('./config.json', fs.F_OK)
const config = require('./config.json')

module.exports = (env = {}) => ({
	entry: [
		'babel-polyfill',
		__dirname + '/src/index.js'
	],
	devServer: {
		contentBase: buildDir
	},
	output: {
		path: buildDir + '/js',
		publicPath: '/js/',
		filename: 'bundle.js',
	},
	module: {
		rules: [
			{
				test: /\.js$/,
				loaders: ['react-hot-loader', 'babel-loader'],
				exclude: /node_modules/
			},
			{
				test: /\.scss$/,
				loaders: ['style-loader', 'css-loader', 'sass-loader'],
			},
			{
				test: /\.(woff2?|ttf|eot|png)$/,
				loader: 'url-loader'
			}
		]
	},
	plugins: [
		new CleanWebpackPlugin(['js/'], {
			root: buildDir
		}),
		new webpack.DefinePlugin({
			'process.env.NODE_ENV': JSON.stringify(env.prod ? 'production' : 'development'),
			'WEB_API_URL': JSON.stringify(config.webApiUrl),
			'USE_MOCK': !!env.mock
		})
	]
	.concat(!!env.prod ? [
		new webpack.optimize.UglifyJsPlugin()
	] : [])
})
