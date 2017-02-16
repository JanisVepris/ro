import React from 'react'
import ReactDOM from 'react-dom'
import { Provider } from 'react-redux'
import * as Router from './router'
import store from './store.js'

ReactDOM.render(
	<Provider store={ store }>
		<Router.default />
	</Provider>,
	document.getElementById('app')
)