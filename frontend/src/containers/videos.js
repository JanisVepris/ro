import { connect } from 'react-redux'
import VideoPlaylistComponent from '../components/Videos'

const mapStateToProps = (state) => {
	
	const activeEventId = state.app.activeEventId
	const { videoPlaylistId } = state.events.byId[activeEventId]
	const videos = state.videos.byId[videoPlaylistId]

	return {
		initialized: !!videos,
		videoPlaylistId,
		ids: videos && videos.length
	}
}

export default connect(
	mapStateToProps
)(VideoPlaylistComponent)
