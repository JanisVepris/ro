import { combineReducers } from 'redux'
import { toReducer } from './utils'

import { 
	HEADER_TOGGLE_EVENTS,
	HEADER_TOGGLE_NAVIGATION,
	HEADER_SET_COVER,
	HEADER_SET_LOADING
} from '../actions/header'

// Reducers
const isEventsDropdownVisible = toReducer(false, state => ({
	[HEADER_TOGGLE_EVENTS]: () => state = !state
}))

const isNavigationDropdownVisible = toReducer(false, state => ({
	[HEADER_TOGGLE_NAVIGATION]: () => state = !state
}))

const coverUrl = toReducer(null, () => ({
	[HEADER_SET_COVER]: (action) => action.url
}))

const loading = toReducer(true, () => ({
	[HEADER_SET_LOADING]: (action) => action.loading
}))

export default combineReducers({
	isEventsDropdownVisible,
	isNavigationDropdownVisible,
	coverUrl,
	loading
})
