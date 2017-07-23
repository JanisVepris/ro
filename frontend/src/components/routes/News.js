import React from 'react'
import { navigateToOverview } from '../../actions/app'

import NewsOverviewTable from '../../containers/news/news-overview-table'

export default class News extends React.Component {

	componentWillMount() {
		this.props.dispatch(navigateToOverview(this.props.eventId, this.props.params.newsPageSlug))
	}

	render() {
		return (
			<div>
				<p className="article-title">{ this.props.title }</p>
				<NewsOverviewTable />
			</div>
		)
	}
}