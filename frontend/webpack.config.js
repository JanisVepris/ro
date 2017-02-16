/* eslint-disable */
var path = require('path')
var CleanWebpackPlugin = require('clean-webpack-plugin')

var appRoot = 'src'
var buildDir = __dirname + '/../src/TemplateBundle/Resources/public'

//var extractCSS = new ExtractTextPlugin('stylesheets/main.css')

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
				test: /\.js$/,
				loaders: ['react-hot', 'babel'],
				exclude: /node_modules/,
			},
			{
				test: /\.(woff2?|ttf|eot|svg)$/,
				loader: 'url?limit=10000'
			},
			{
				test: /\.scss$/,
				loaders: ['style', 'css', 'sass'],
			},
			{
				test: /\.css$/,
				loaders: ['style', 'css'],
			}
		],
	},
	devServer: {
		contentBase: buildDir,
	},
	plugins: [
		new CleanWebpackPlugin(['css/main.css', 'js/bundle.js'], {
			root: buildDir,
			verbose: true,
			dry: false
		})
	]
};
