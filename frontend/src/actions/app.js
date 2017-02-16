import * as eventsRepo from '../repo/events'

import { loadEventInfo } from './events'

// Action types
export const APP_SET_INITIALIZED = 'APP_SET_INITIALIZED'
export const APP_SET_EVENTS = 'APP_SET_EVENTS'
export const APP_SET_ACTIVE_EVENT = 'APP_SET_ACTIVE_EVENT'

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
		.then(() => dispatch(setInitialized()))
		.catch(error => {
			console.log('Error: ', error)
		})
}