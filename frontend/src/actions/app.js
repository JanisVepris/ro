import * as eventsRepo from '../repo/events'
import { push } from 'react-router-redux'
import { browserHistory } from 'react-router'

import { loadEventInfo, loadEventNews } from './events'
import { setHeaderCover } from './header'

// Action types
export const APP_SET_INITIALIZED = 'APP_SET_INITIALIZED'
export const APP_SET_EVENTS = 'APP_SET_EVENTS'
export const APP_SET_ACTIVE_EVENT = 'APP_SET_ACTIVE_EVENT'
export const APP_SET_ACTIVE_CATEGORY = 'APP_SET_ACTIVE_CATEGORY'

// Action creators
export const setInitialized = () => ({
	type: APP_SET_INITIALIZED
})

export const setActiveEvent = (id) => ({
	type: APP_SET_ACTIVE_EVENT,
	id
})

export const setAvailableEvents = (events) => ({
	type: APP_SET_EVENTS,
	events
})

export const setActiveCategory = (category) => ({
	type: APP_SET_ACTIVE_CATEGORY,
	category
})

// Thunks
export const initialize = (urlParams) => (
	dispatch,
	getState
) => {

	return eventsRepo.getEvents()
		.then(response => {

			dispatch(setAvailableEvents(response))

			const activeEvent = urlParams.eventSlug
				? response.find(event => event.slug === urlParams.eventSlug) || response[0]
				: response[0]

			if (!activeEvent.id) {
				throw Error('Event not found')
			}

			dispatch(setActiveEvent(activeEvent.id))

			return Promise.resolve()
		})
		.then(() => dispatch(loadEventInfo(getState().app.activeEventId)))
		.then(() => {

			const state = getState()
			const { activeEventId } = state.app

			dispatch(setHeaderCover(state.events.byId[activeEventId].image))
			dispatch(setInitialized())
		})
		.catch(error => {
			console.log('Error: ', error)
		})
}

// Thunks
export const navigateToOverview = (id) => (
	dispatch,
	getState
) => {

	const eventSlug = getState().app.eventsById[id].slug
	const newPath = '/' + eventSlug

	browserHistory.push(newPath)
	dispatch(push(newPath))
	dispatch(setActiveEvent(id))
	dispatch(setActiveCategory('news'))

	return dispatch(loadEventInfo(id))
		.then(() => dispatch(loadEventNews(id)))
}