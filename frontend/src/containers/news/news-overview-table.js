import { connect } from 'react-redux'

import NewsOverviewTable from '../../components/news/NewsOverviewTable'

// Pagingo logika tures atgult cia
// Reik selectoriu
const mapStateToProps = (state) => {

	const activeEventsNews = state.events.newsById[state.app.activeEventId]
	const articles = activeEventsNews && activeEventsNews.articles

	return {
		firstArticle: articles && articles[0],
		articles: articles && articles.slice(1, articles.length) || []
	}
}

export default connect(
	mapStateToProps
)(NewsOverviewTable)
