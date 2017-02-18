import eventGalleriesMock from './event-galleries-mock'

export const getGallery = (_eventId, galleryId) => {

	const delayedPromise = new Promise((resolve) => setTimeout(() => resolve(eventGalleriesMock(galleryId)), 300))

	return Promise.resolve(delayedPromise)
}