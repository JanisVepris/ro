import * as eventGalleryRepo from '../repo/event-galleries'

// Action types
export const GALLERY_SET = 'GALLERY_SET'
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

export const loadGallery = () => (
	dispatch,
	getState
) => {

	const state = getState()

	if (state.galleries.byId[state.app.activeEventId]) {
		return Promise.resolve()
	}

	return eventGalleryRepo.getGallery(state.app.activeEventId)
		.then(response => {
			dispatch(setGallery(state.app.activeEventId, response))
		})
		.catch(err => {
			console.log(err)
		})
}