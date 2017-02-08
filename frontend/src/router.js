import React from 'react'
import { Router, Route, IndexRoute } from 'react-router'
import { history } from './store.js'
import App from './components/App'
import Home from './components/Home'

export default () => (
	<Router history={ history }>
		<Route path='/' component={ App }>
			<IndexRoute component={ Home } />
		</Route>
	</Router>
)
