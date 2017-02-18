import { combineReducers } from 'redux'
import { toReducer } from './utils'

import { 
	APP_SET_INITIALIZED,
	APP_SET_EVENTS,
	APP_SET_ACTIVE_EVENT,
	APP_SET_ACTIVE_CATEGORY
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

const activeCategory = toReducer('news', () => ({
	[APP_SET_ACTIVE_CATEGORY]: action => action.category
}))

const categories = toReducer({
	news: 'Naujienos',
	gallery: 'Galerija'
}, () => ({}))

export default combineReducers({
	initialized,
	activeEventId,
	eventsById,
	activeCategory,
	categories
})
