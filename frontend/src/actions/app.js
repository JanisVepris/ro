import * as eventsRepo from '../repo/events'
import * as eventInfoRepo from '../repo/event-info'

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
export const initialize = () => (
	dispatch,
	getState
) => {

	return eventsRepo.getEvents()
		.then(response => {

			dispatch(setAvailableEvents(response))
			
			dispatch(setActiveEvent(response[0].id))

			return dispatch(loadEventInfo(getState().app.activeEventId))
		})
		.then(() => {
			dispatch(setInitialized())
		})
		.catch(error => {
			console.log('Error: ', error)
		})
}

const loadEventInfo = (id) => (
	dispatch,
	getState
) => {

	const state = getState()

	if (state.app.eventsById[state.app.activeEventId]) {
		return Promise.resolve()
	}

	return eventInfoRepo.getEventsInfo(id)
		.then(response => {
			console.log(response)
		})
		.catch(err => {
			console.log(err)
		})
}
