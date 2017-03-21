import eventVideosMock from './event-videos-mock'

export const getVideoPlaylist = (eventId) => {

	const delayedPromise = new Promise((resolve) => setTimeout(() => resolve(eventVideosMock(eventId)), 300))

	return Promise.resolve(delayedPromise)
}