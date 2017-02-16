import React from 'react'
import { Router, Route, IndexRoute } from 'react-router'
import { history } from './store'
import App from './containers/app'

import News from './containers/news'

export default () => (
	<Router history={ history }>
		<Route path='/(:eventSlug)' component={ App }>
			<IndexRoute component={ News } />
			<Route path='/:eventSlug/naujienos' component={ News } />
		</Route>
	</Router>
)