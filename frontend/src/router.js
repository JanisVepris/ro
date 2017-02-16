import React from 'react'
import { Router, Route, IndexRoute } from 'react-router'
import { history } from './store'
import App from './containers/app'

import EventOverview from './containers/overview'
//import News from './routes/News'

export default () => (
	<Router history={ history }>
		<Route path='/' component={ App }>
			<IndexRoute component={ EventOverview } />
			<Route path='/:eventSlug' component={ EventOverview }>
			</Route>
		</Route>
	</Router>
)
// <IndexRoute component={ News } />
// <Route path='/naujienos' component={ News } />
