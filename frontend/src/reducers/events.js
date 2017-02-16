import { combineReducers } from 'redux'
import { toReducer } from './utils'

import { 
	EVENT_ADD
} from '../actions/events'

const byId = toReducer({}, (state) => ({
	[EVENT_ADD]: action => ({
		...state,
		[action.event.id]: action.event
	})
}))

export default combineReducers({
	byId
})
