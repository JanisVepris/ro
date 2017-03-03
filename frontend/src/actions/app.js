import * as eventsRepo from '../repo/events'
import { push } from 'react-router-redux'
import { browserHistory } from 'react-router'
import Config from '../config'

import { loadEventInfo, loadEventNews } from './events'
import { setHeaderCover, setHeaderLoading } from './header'

// Action types
export const APP_SET_INITIALIZED = 'APP_SET_INITIALIZED'
export const APP_SET_EVENTS = 'APP_SET_EVENTS'
export const APP_SET_ACTIVE_EVENT = 'APP_SET_ACTIVE_EVENT'
export const APP_SET_DEFAULT_EVENT = 'APP_SET_DEFAULT_EVENT'
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

export const setDefaultEvent = (id) => ({
	type: APP_SET_DEFAULT_EVENT,
	id
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
			dispatch(setDefaultEvent(response[0].id))

			return Promise.resolve()
		})
		.then(() => dispatch(loadEventInfo(getState().app.activeEventId)))
		.then(() => dispatch(setInitialized()))
		.catch(error => {
			console.log('Error: ', error)
		})
}

// Thunks
export const navigateToOverview = (id) => (
	dispatch,
	getState
) => {

	dispatch(setHeaderLoading(true))

	const eventSlug = getState().app.eventsById[id].slug
	const newPath = '/' + eventSlug + '/' + Config.categories['news'].slug

	browserHistory.push(newPath)
	dispatch(push(newPath))

	return dispatch(loadEventInfo(id))
		.then(() => dispatch(loadEventNews(id)))
		.then(() => {
			dispatch(setActiveCategory('news'))
			dispatch(setHeaderCover(getState().events.byId[id].image))
		})
}

export const setActiveEventBySlug = (slug) => (
	dispatch,
	getState
) => {

	if (!slug) {
		dispatch(setActiveEvent(getState().app.defaultEventId))
		return
	}

	const { eventsById } = getState().app

	const event = Object.keys(eventsById)
		.map(eventId => eventsById[eventId])
		.find(event => event.slug === slug)

	const eventId = event && event.id
	
	if (eventId === getState().app.activeEventId) {
		return
	}

	dispatch(setActiveEvent(eventId))
}