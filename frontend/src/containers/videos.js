import { connect } from 'react-redux'
import VideoPlaylistComponent from '../components/routes/Videos'

const mapStateToProps = (state) => {
	
	const activeEventId = state.app.activeEventId
	const { videoPlaylistId } = state.events.byId[activeEventId]
	const videos = state.videos.byId[videoPlaylistId]

	const eventName = state.app.eventsById[activeEventId].name

	return {
		initialized: !!videos,
		videoPlaylistId,
		videos,
		title: eventName + ': Įrašai',
		hidden: state.header.loading
	}
}

export default connect(
	mapStateToProps
)(VideoPlaylistComponent)
