import playlistsMock from './event-playlists-mock'

export const getPlaylist = (id) => {

	const delayedPromise = new Promise((resolve) => setTimeout(() => resolve(playlistsMock(id)), 0))

	return Promise.resolve(delayedPromise)
}