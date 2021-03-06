import * as eventInfoRepo from '../repo/event-info'
import * as eventArticlesRepo from '../repo/event-articles'
import * as eventScriptRepo from '../repo/event-script'
import * as eventFactsRepo from '../repo/event-facts'
import * as eventTeamRepo from '../repo/event-team'
import * as eventPosterRepo from '../repo/event-poster'
import * as eventPlaylistRepo from '../repo/event-playlists'

// Constants
export const ARTICLES_IN_PAGE = 7

// Action types
export const EVENT_ADD = 'EVENT_ADD'
export const EVENT_NEWS_SET = 'EVENT_NEWS_SET'
export const EVENT_FACTS_SET = 'EVENT_FACTS_SET'
export const EVENT_TEAM_SET = 'EVENT_TEAM_SET'
export const EVENT_SCRIPT_SET = 'EVENT_SCRIPT_SET'
export const EVENT_POSTER_SET = 'EVENT_POSTER_SET'
export const EVENT_PLAYLIST_SET = 'EVENT_PLAYLIST_SET'

// Action creators
export const addEvent = (event) => ({ type: EVENT_ADD, event })
export const setNews = (id, news) => ({ type: EVENT_NEWS_SET, id, news })
export const setFacts = (id, facts) => ({ type: EVENT_FACTS_SET, id, facts })
export const setTeam = (id, team) => ({ type: EVENT_TEAM_SET, id, team })
export const setScript = (id, script) => ({ type: EVENT_SCRIPT_SET, id, script })
export const setPoster = (id, poster) => ({ type: EVENT_POSTER_SET, id, poster })
export const setPlaylist = (id, playlist) => ({ type: EVENT_PLAYLIST_SET, id, playlist })

// Thunks
export const loadEventInfo = (id) => (
	dispatch,
	getState
) => {
	
	if (getState().events.byId[id]) {
		return Promise.resolve()
	}

	return eventInfoRepo.getEventInfo(id)
		.then(response => {
			dispatch(addEvent(response))
		})
		.catch(err => {
			console.log(err)
		})
}

export const loadEventNews = (id) => (
	dispatch,
	getState
) => {

	const { newsById, articlesPage } = getState().events

	if (newsById[id]) {
		return Promise.resolve()
	}

	return eventArticlesRepo.getEventArticles(id, ARTICLES_IN_PAGE, 0 + ARTICLES_IN_PAGE * (articlesPage - 1))
		.then(response => dispatch(setNews(id, response)))
		.catch(err => {
			console.log(err)
		})
}

export const loadEventScript = (id) => (
	dispatch,
	getState
) => {

	if (getState().events.scriptById[id]) {
		return Promise.resolve()
	}

	return eventScriptRepo.getScript(id)
		.then(response => dispatch(setScript(id, response)))
		.catch(err => {
			console.log(err)
		})
}

export const loadEventTeam = (id) => (
	dispatch,
	getState
) => {

	if (getState().events.teamById[id]) {
		return Promise.resolve()
	}

	return eventTeamRepo.getTeam(id)
		.then(response => dispatch(setTeam(id, response)))
		.catch(err => {
			console.log(err)
		})
}

export const loadEventFacts = (id) => (
	dispatch,
	getState
) => {

	if (getState().events.factsById[id]) {
		return Promise.resolve()
	}

	return eventFactsRepo.getFacts(id)
		.then(response => dispatch(setFacts(id, response)))
		.catch(err => {
			console.log(err)
		})
}

export const loadEventPoster = (id) => (
	dispatch,
	getState
) => {

	if (getState().events.posterById[id]) {
		return Promise.resolve()
	}

	return eventPosterRepo.getPoster(id)
		.then(response => dispatch(setPoster(id, response)))
		.catch(err => {
			console.log(err)
		})
}

export const loadEventPlaylist = (id) => (
	dispatch,
	getState
) => {

	if (getState().events.playlistById[id]) {
		return Promise.resolve()
	}

	return eventPlaylistRepo.getPlaylist(id)
		.then(response => dispatch(setPlaylist(id, response.items)))
		.catch(err => {
			console.log(err)
		})
}
