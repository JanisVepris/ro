import { connect } from 'react-redux'

import NewsOverviewTable from '../../components/news/NewsOverviewTable'

import { navigateToArticle } from '../../actions/articles'

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
	mapStateToProps,
	{
		navigateToArticle
	},
	(stateProps, dispatchProps) => {

		const firstArticle = {
			...stateProps.firstArticle,
			onClick: () => dispatchProps.navigateToArticle(stateProps.firstArticle.slug)
		}
		
		const articles = stateProps.articles.map(article => ({
			...article,
			onClick: () => dispatchProps.navigateToArticle(article.slug)
		}))

		return {
			firstArticle,
			articles
		}
	}
)(NewsOverviewTable)
