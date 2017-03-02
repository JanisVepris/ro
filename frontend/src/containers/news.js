import { connect } from 'react-redux'
import NewsComponent from '../components/News'

const mapStateToProps = (state) => {
	
	const activeEventId = state.app.activeEventId
	const news = state.events.newsById[activeEventId]

	return {
		headerLoading: state.header.loading,
		initialized: !!news,
		eventId: activeEventId,
		ids: news
	}
}

export default connect(
	mapStateToProps
)(NewsComponent)
