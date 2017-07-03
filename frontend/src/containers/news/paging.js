import { connect } from 'react-redux'
import Paging from '../../components/news/Paging'

import { ARTICLES_IN_PAGE } from '../../actions/events'
import { changePage } from '../../actions/articles'

const mapStateToProps = (state) => {

	const { articlesPage, newsById } = state.events
	const articles = newsById[state.app.activeEventId]

	if (!articles) {
		return {
			hidden: true
		}
	}

	const articleCount = articles.total
	const pageCount = Math.floor(articleCount / ARTICLES_IN_PAGE)
		+ (articleCount % ARTICLES_IN_PAGE > 0 ? 1 : 0)

	return {
		currentPage: articlesPage,
		pageCount
	}
}

export default connect(
	mapStateToProps,
	{
		onPageChange: changePage
	}
)(Paging)
