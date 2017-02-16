import * as eventInfoRepo from '../repo/event-info'

// Action types
export const EVENT_ADD = 'EVENT_ADD'

// Action creators
export const addEvent = (event) => ({
	type: EVENT_ADD,
	event
})

// Thunks
export const loadEventInfo = (id) => (
	dispatch,
	getState
) => {
	
	const state = getState()

	if (state.events.byId[state.app.activeEventId]) {
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