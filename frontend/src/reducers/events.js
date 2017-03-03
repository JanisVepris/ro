import { combineReducers } from 'redux'
import { toReducer } from './utils'

import { 
	EVENT_ADD,
	EVENT_NEWS_SET
} from '../actions/events'

import { 
	ARTICLE_SET_ACTIVE,
	ARTICLE_SET_LOADING,
	ARTICLE_SET
} from '../actions/articles'

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

const articleById = toReducer({}, state => ({
	[ARTICLE_SET]: action => ({
		...state,
		[action.id]: action.article
	})
}))

const activeArticle = toReducer(null, () => ({
	[ARTICLE_SET_ACTIVE]: action => action.id
}))

const articleLoading = toReducer(false, () => ({
	[ARTICLE_SET_LOADING]: action => action.loading
}))

export default combineReducers({
	byId,
	newsById,
	activeArticle,
	articleLoading,
	articleById
})
