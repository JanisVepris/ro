import { connect } from 'react-redux'
import VideoPlaylistComponent from '../components/routes/Videos'
import hideable from '../components/hideable'

const mapStateToProps = (state) => {
	
	const activeEventId = state.app.activeEventId
	const { videoPlaylistId } = state.events.byId[activeEventId]
	const videos = state.videos.byId[videoPlaylistId]

	const eventName = state.app.eventsById[activeEventId].name

	return {
		headerLoading: state.header.loading,
		videosLoading: !videos,
		videoPlaylistId,
		videos,
		title: eventName + ': Įrašai',
		hidden: state.header.loading
	}
}

export default connect(
	mapStateToProps
)(hideable(VideoPlaylistComponent))
