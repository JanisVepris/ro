import { combineReducers } from 'redux'
import { toReducer } from './utils'

import { 
	EVENT_ADD,
	EVENT_NEWS_SET,
	EVENT_FACTS_SET,
	EVENT_SCRIPT_SET,
	EVENT_TEAM_SET,
	EVENT_POSTER_SET,
	EVENT_PLAYLIST_SET
} from '../actions/events'

import { 
	ARTICLE_SET_ACTIVE,
	ARTICLE_SET_LOADING,
	ARTICLE_SET
} from '../actions/articles'

// Reducers
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

const factsById = toReducer({}, state => ({
	[EVENT_FACTS_SET]: action => ({
		...state,
		[action.id]: action.facts
	})
}))

const scriptById = toReducer({}, state => ({
	[EVENT_SCRIPT_SET]: action => ({
		...state,
		[action.id]: action.script
	})
}))

const teamById = toReducer({}, state => ({
	[EVENT_TEAM_SET]: action => ({
		...state,
		[action.id]: action.team
	})
}))

const posterById = toReducer({}, state => ({
	[EVENT_POSTER_SET]: action => ({
		...state,
		[action.id]: action.poster
	})
}))

const playlistById = toReducer({}, state => ({
	[EVENT_PLAYLIST_SET]: action => ({
		...state,
		[action.id]: action.playlist
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
	articleById,
	factsById,
	teamById,
	scriptById,
	posterById,
	playlistById
})
