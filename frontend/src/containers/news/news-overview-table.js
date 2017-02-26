import { connect } from 'react-redux'

import NewsOverviewTable from '../../components/news/NewsOverviewTable'

// Pagingo logika tures atgult cia
const mapStateToProps = (state) => {

	const activeEventsNews = state.events.newsById[state.app.activeEventId]
	
	return {
		news: activeEventsNews && activeEventsNews.articles || []
	}
}

export default connect(
	mapStateToProps
)(NewsOverviewTable)
