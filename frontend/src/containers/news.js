import { connect } from 'react-redux'
import NewsComponent from '../components/News'

const mapStateToProps = (state) => {
	
	const activeEventId = state.app.activeEventId
	const news = state.events.newsById[activeEventId]

	return {
		initialized: !!news,
		eventId: activeEventId,
		ids: news && news.total
	}
}

export default connect(
	mapStateToProps
)(NewsComponent)
