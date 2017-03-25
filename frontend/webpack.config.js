/* eslint-disable */
var path = require('path')
var CleanWebpackPlugin = require('clean-webpack-plugin')
var webpack = require('webpack')
var fs = require('fs')

fs.accessSync('./config.json', fs.F_OK)
var config = require('./config.json')

var appRoot = 'src'
var buildDir = __dirname + '/../src/TemplateBundle/Resources/public'

var nopt = require("nopt")
var args = nopt({
	'useMock': Boolean
}, {}, process.argv)

var USE_MOCK = !!args.useMock

module.exports = {
	app_root: 'src',
	entry: [
		'webpack-dev-server/client?http://localhost:8080',
		'webpack/hot/only-dev-server',
		'babel-polyfill',
		__dirname + '/' + appRoot + '/index.js',
	],
	output: {
		path: buildDir + '/js',
		publicPath: 'js/',
		filename: 'bundle.js',
	},
	module: {
		loaders: [
			{
				test: /\.json?$/,
				loader: 'json-loader'
			},
			{
				test: /\.scss$/,
				loaders: ['style', 'css', 'sass'],
			},
			{
				test: /\.(woff2?|ttf|eot|png)$/,
				loader: 'url?limit=10000'
			},
			{
				test: /\.js$/,
				loaders: ['react-hot', 'babel'],
				exclude: /node_modules/,
			},
			{
				test: /\.css$/,
				loaders: ['style', 'css'],
			}
		],
	},
	devServer: {
		contentBase: buildDir
	},
	plugins: [
		new CleanWebpackPlugin(['js/bundle.js'], {
			root: buildDir,
			verbose: true,
			dry: false
		}),
		new webpack.DefinePlugin({
			USE_MOCK: USE_MOCK,
			'WEB_API_URL': JSON.stringify(config.webApiUrl)
		})
	]
};
