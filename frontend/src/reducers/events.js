import { combineReducers } from 'redux'
import { toReducer } from './utils'

import { 
	EVENT_ADD,
	EVENT_NEWS_SET
} from '../actions/events'

const byId = toReducer({}, state => ({
	[EVENT_ADD]: action => ({
		...state,
		[action.event.id]: action.event
	})
}))

const newsById = toReducer({}, state => ({
	[EVENT_NEWS_SET]: action => ({
		...state,
		[action.id]: action.news
	})
}))

export default combineReducers({
	byId,
	newsById
})
