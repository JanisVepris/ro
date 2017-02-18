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