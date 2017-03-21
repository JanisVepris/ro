import eventGalleriesMock from './event-galleries-mock'

export const getGallery = (eventId) => {

	const delayedPromise = new Promise((resolve) => setTimeout(() => resolve(eventGalleriesMock(eventId)), 300))

	return Promise.resolve(delayedPromise)
}