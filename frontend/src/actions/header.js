import { push } from 'react-router-redux'
import { setActiveCategory } from './app'

import Config from '../config'

// Action types
export const HEADER_TOGGLE_EVENTS = 'HEADER_TOGGLE_EVENTS'
export const HEADER_TOGGLE_NAVIGATION = 'HEADER_TOGGLE_NAVIGATION'
export const HEADER_SET_COVER = 'HEADER_SET_COVER'
export const HEADER_SET_LOADING = 'HEADER_SET_LOADING'

// Action creators
export const toggleEventsDropdown = () => ({
	type: HEADER_TOGGLE_EVENTS
})

export const toggleNavigationDropdown = () => ({
	type: HEADER_TOGGLE_NAVIGATION
})

export const setHeaderImage = (url) => ({
	type: HEADER_SET_COVER,
	url
})

export const setHeaderLoading = (loading) => ({
	type: HEADER_SET_LOADING,
	loading
})

export const navigateToCategory = (category) => (
	dispatch,
	getState
) => {

	const state = getState()

	if (state.app.activeCategory === category) {
		return
	}

	if (category !== 'article') {
		dispatch(setHeaderCover(state.events.byId[state.app.activeEventId].image, true))
	} else {
		window.scrollTo(0, 0)
	}

	const categorySlug = Config.categories[category].slug
	const eventSlug = state.app.eventsById[state.app.activeEventId].slug

	dispatch(push('/' + eventSlug + '/' + categorySlug))
	dispatch(setActiveCategory(category))
}

export const setHeaderCover = (url, animate) => (
	dispatch,
	getState
) => {

	dispatch(setHeaderLoading(true))

	if (getState().header.coverUrl === url) {
		if (animate) {
			setTimeout(() => {
				dispatch(setHeaderLoading(false))
			}, 0)
		} else {
			dispatch(setHeaderLoading(false))
		}
		return
	}

	dispatch(setHeaderImage(url))
}