import { push } from 'react-router-redux'

import { setActiveEvent } from './app'
import { loadEventInfo } from './events'

// Thunks
export const navigateToOverview = (id) => (
	dispatch,
	getState
) => {

	const eventSlug = getState().app.eventsById[id].eventSlug

	dispatch(push('/' + eventSlug))
	dispatch(setActiveEvent(id))

	return dispatch(loadEventInfo(id))
}