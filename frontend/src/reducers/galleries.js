import { combineReducers } from 'redux'
import { toReducer } from './utils'

import { 
	GALLERY_SET,
	GALLERY_IMAGE_SET_ACTIVE
} from '../actions/galleries'

const byId = toReducer({}, state => ({
	[GALLERY_SET]: action => ({
		...state,
		[action.id]: action.gallery
	})
}))

const activeImageIndex = toReducer(null, () => ({
	[GALLERY_IMAGE_SET_ACTIVE]: action => action.index
}))

export default combineReducers({
	byId,
	activeImageIndex
})
