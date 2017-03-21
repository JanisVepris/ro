import { connect } from 'react-redux'
import VideoPlaylistComponent from '../components/routes/Videos'

const mapStateToProps = (state) => {
	
	const activeEventId = state.app.activeEventId
	const videosData = state.videos.byId[activeEventId]

	const eventName = state.app.eventsById[activeEventId].name

	return {
		initialized: !!videosData,
		videos: videosData && videosData.items,
		title: eventName + ': Įrašai',
		hidden: state.header.loading
	}
}

export default connect(
	mapStateToProps
)(VideoPlaylistComponent)
