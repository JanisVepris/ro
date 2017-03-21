import { connect } from 'react-redux'
import PlaylistComponent from '../components/routes/Playlist'

import { navigateToCategory } from '../actions/header'
import { loadEventPlaylist } from '../actions/events'

const mapStateToProps = (state) => {
	
	const { playlistById } = state.events
	const { activeEventId, eventsById } = state.app
	const eventName = eventsById[activeEventId].name

	const playlist = playlistById[activeEventId]

	return {
		title: eventName + ': Grojaraštis',
		playlist,
		activeEventId
	}
}

export default connect(
	mapStateToProps, 
	{
		navigateToCategory,
		loadEventPlaylist
	},
	(stateProps, dispatchProps) => ({
		...stateProps,
		navigateToPlaylist: () => dispatchProps.navigateToCategory('playlist'),
		loadPlaylist: () => dispatchProps.loadEventPlaylist(stateProps.activeEventId)
	})
)(PlaylistComponent)
