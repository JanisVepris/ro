import * as eventGalleryRepo from '../repo/event-galleries'
import { navigateToCategory } from './header'

// Action types
export const GALLERY_SET = 'EVENT_NEWS_SET'

// Action creators
const setGallery = (id, gallery) => ({
	type: GALLERY_SET,
	id,
	gallery
})

export const loadGallery = (id) => (
	dispatch,
	getState
) => {

	const state = getState()

	dispatch(navigateToCategory('gallery'))

	if (state.galleries.byId[id]) {
		return Promise.resolve()
	}

	return eventGalleryRepo.getGallery(state.app.activeEventId, id)
		.then(response => {
			dispatch(setGallery(id, response))
		})
		.catch(err => {
			console.log(err)
		})
}