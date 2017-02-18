import eventVideosMock from './event-videos-mock'

export const getVideoPlaylist = (_eventId, videoPlaylistId) => {

	const delayedPromise = new Promise((resolve) => setTimeout(() => resolve(eventVideosMock(videoPlaylistId)), 300))

	return Promise.resolve(delayedPromise)
}