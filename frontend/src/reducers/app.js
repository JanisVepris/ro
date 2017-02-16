import { combineReducers } from 'redux'
import { toReducer } from './utils'

import { 
	APP_SET_INITIALIZED,
	APP_SET_EVENTS,
	APP_SET_ACTIVE_EVENT
} from '../actions/app'

const initialized = toReducer(false, () => ({
	[APP_SET_INITIALIZED]: () => true
}))

const activeEventId = toReducer(null, () => ({
	[APP_SET_ACTIVE_EVENT]: action => action.id
}))

const eventsById = toReducer({}, () => ({
	[APP_SET_EVENTS]: action => action.events.reduce(
		(obj, event) => ({
			...obj,
			[event.id]: {
				...event
			}
		}),
		{}
	)
}))

export default combineReducers({
	initialized,
	activeEventId,
	eventsById
})
