import { push } from 'react-router-redux'
import { setActiveCategory } from './app'

import Config from '../config'

// Action types
export const HEADER_TOGGLE_EVENTS = 'HEADER_TOGGLE_EVENTS'
export const HEADER_TOGGLE_NAVIGATION = 'HEADER_TOGGLE_NAVIGATION'

// Action creators
export const toggleEventsDropdown = () => ({
	type: HEADER_TOGGLE_EVENTS
})

export const toggleNavigationDropdown = () => ({
	type: HEADER_TOGGLE_NAVIGATION
})

export const navigateToCategory = (category) => (
	dispatch,
	getState
) => {

	const state = getState()

	if (state.app.activeCategory === category) {
		return
	}

	const categorySlug = Config.categories[category].slug
	const eventSlug = state.app.eventsById[state.app.activeEventId].slug

	dispatch(push('/' + eventSlug + '/' + categorySlug))
	dispatch(setActiveCategory(category))
}