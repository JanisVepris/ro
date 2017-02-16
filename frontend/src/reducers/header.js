import { combineReducers } from 'redux'
import { toReducer } from './utils'

import { 
	HEADER_TOGGLE_EVENTS
} from '../actions/header'

const isEventsDropdownVisible = toReducer(false, state => ({
	[HEADER_TOGGLE_EVENTS]: () => state = !state
}))

export default combineReducers({
	isEventsDropdownVisible
})
