import { connect } from 'react-redux'
import NewsComponent from '../components/routes/News'

const mapStateToProps = (state) => {
	
	const activeEventId = state.app.activeEventId
	const news = state.events.newsById[activeEventId]
	const eventName = state.app.eventsById[activeEventId].name

	return {
		headerLoading: state.header.loading,
		initialized: !!news,
		eventId: activeEventId,
		ids: news,
		title: eventName + ': Naujienos'
	}
}

export default connect(
	mapStateToProps
)(NewsComponent)
