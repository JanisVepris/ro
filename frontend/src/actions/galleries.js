import * as eventGalleryRepo from '../repo/event-galleries'

// Action types
export const GALLERY_SET = 'EVENT_NEWS_SET'
export const GALLERY_IMAGE_SET_ACTIVE = 'GALLERY_IMAGE_SET_ACTIVE'

// Action creators
const setGallery = (id, gallery) => ({
	type: GALLERY_SET,
	id,
	gallery
})

export const setActiveGalleryImage = (index = null) => ({
	type: GALLERY_IMAGE_SET_ACTIVE,
	index
})

export const loadGallery = (id) => (
	dispatch,
	getState
) => {

	const state = getState()

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