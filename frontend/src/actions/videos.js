import * as eventVideosRepo from '../repo/event-videos'

// Action types
export const VIDEO_PLAYLIST_SET = 'VIDEO_PLAYLIST_SET'

// Action creators
const setVideoPlaylist = (id, playlist) => ({ type: VIDEO_PLAYLIST_SET, id, playlist })

// Thunks
export const loadVideoPlaylist = () => (
	dispatch,
	getState
) => {

	const state = getState()
	const { activeEventId } = state.app

	if (state.galleries.byId[activeEventId]) {
		return Promise.resolve()
	}

	return eventVideosRepo.getVideoPlaylist(activeEventId)
		.then(response => {
			dispatch(setVideoPlaylist(activeEventId, response))
		})
		.catch(err => {
			console.log(err)
		})
}
