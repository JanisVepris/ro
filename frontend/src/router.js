import React from 'react'
import { Router, Route, IndexRoute } from 'react-router'
import { history } from './store.js'
import App from './components/App'

import EventOverview from './routes/Event-overview'

export default () => (
	<Router history={ history }>
		<Route path='/' component={ App }>
			<IndexRoute component={ EventOverview } />
			<Route path='/:eventSlug' component={ EventOverview } />
		</Route>
	</Router>
)