import { createStore, combineReducers, applyMiddleware, compose } from 'redux'
import { browserHistory } from 'react-router'
import thunk from 'redux-thunk'
import freeze from 'redux-freeze'
import { syncHistoryWithStore, routerMiddleware, routerReducer} from 'react-router-redux'

// Reducers
import app from './reducers/app'
import events from './reducers/events'
import header from './reducers/header'
import videos from './reducers/videos'
import galleries from './reducers/galleries'

// Middleware
const middlewares = []

middlewares.push(routerMiddleware(browserHistory))
middlewares.push(thunk)

// eslint-disable-next-line no-undef, no-process-env
if (process.env.NODE_ENV !== 'production') {
	middlewares.push(freeze)
}

let middleware = applyMiddleware(...middlewares)

// Redux dev tools

// eslint-disable-next-line no-undef, no-process-env
if (process.env.NODE_ENV !== 'production' && window.devToolsExtension) {
	middleware = compose(middleware, window.devToolsExtension())
}

// Reducers
const reducers = combineReducers({
	routing: routerReducer,
	app,
	events,
	header,
	galleries,
	videos
})

// Store
const store = createStore(reducers, middleware)
export const history = syncHistoryWithStore(browserHistory, store)

export default store
