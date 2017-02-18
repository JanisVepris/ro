import { combineReducers } from 'redux'
import { toReducer } from './utils'

import { 
	GALLERY_SET
} from '../actions/galleries'

const byId = toReducer({}, state => ({
	[GALLERY_SET]: action => ({
		...state,
		[action.id]: action.gallery
	})
}))

export default combineReducers({
	byId
})
