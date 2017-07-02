import { combineReducers } from 'redux'
import { toReducer } from './utils'

import { 
	VIDEO_PLAYLIST_SET
} from '../actions/videos.js'

// Reducers
const byId = toReducer({}, state => ({
	[VIDEO_PLAYLIST_SET]: action => ({
		...state,
		[action.id]: action.playlist
	})
}))

export default combineReducers({
	byId
})
