import React from 'react'
import ReactDOM from 'react-dom'
import { Provider } from 'react-redux'
import * as Router from './router.js'
import store from './store.js'

import { initialize } from './actions/app'

ReactDOM.render(
	<Provider store={ store }>
		<Router.default />
	</Provider>,
	document.getElementById('app')
)

store.dispatch(initialize())