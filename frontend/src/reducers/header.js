import { combineReducers } from 'redux'
import { toReducer } from './utils'

import { 
	HEADER_TOGGLE_EVENTS,
	HEADER_TOGGLE_NAVIGATION
} from '../actions/header'

const isEventsDropdownVisible = toReducer(false, state => ({
	[HEADER_TOGGLE_EVENTS]: () => state = !state
}))

const isNavigationDropdownVisible = toReducer(false, state => ({
	[HEADER_TOGGLE_NAVIGATION]: () => state = !state
}))

export default combineReducers({
	isEventsDropdownVisible,
	isNavigationDropdownVisible
})
