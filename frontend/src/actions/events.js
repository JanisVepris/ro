import * as eventInfoRepo from '../repo/event-info'
import * as eventArticlesRepo from '../repo/event-articles'

import { setHeaderCover } from './header'

// Action types
export const EVENT_ADD = 'EVENT_ADD'
export const EVENT_NEWS_SET = 'EVENT_NEWS_SET'

// Action creators
export const addEvent = (event) => ({
	type: EVENT_ADD,
	event
})

export const setNews = (id, news) => ({
	type: EVENT_NEWS_SET,
	id,
	news
})

// Thunks
export const loadEventInfo = (id) => (
	dispatch,
	getState
) => {
	
	const state = getState()

	if (state.events.byId[id]) {
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

	const state = getState()
	const { activeEventId } = state.app

	if (state.events.newsById[id]) {
		return Promise.resolve()
	}

	return eventArticlesRepo.getEventArticles(id)
		.then(response => {
			dispatch(setNews(id, response))
			dispatch(setHeaderCover(state.events.byId[activeEventId].image))
		})
		.catch(err => {
			console.log(err)
		})
}
