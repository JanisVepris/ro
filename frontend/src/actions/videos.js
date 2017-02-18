import * as eventVideosRepo from '../repo/event-videos'
import { navigateToCategory } from './header'

// Action types
export const VIDEO_PLAYLIST_SET = 'VIDEO_PLAYLIST_SET'

// Action creators
const setVideoPlaylist = (id, playlist) => ({
	type: VIDEO_PLAYLIST_SET,
	id,
	playlist
})

export const loadVideoPlaylist = (id) => (
	dispatch,
	getState
) => {

	const state = getState()

	dispatch(navigateToCategory('videos'))

	if (state.galleries.byId[id]) {
		return Promise.resolve()
	}

	return eventVideosRepo.getVideoPlaylist(state.app.activeEventId, id)
		.then(response => {
			dispatch(setVideoPlaylist(id, response))
		})
		.catch(err => {
			console.log(err)
		})
}
