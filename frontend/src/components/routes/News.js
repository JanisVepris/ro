import React from 'react'
import { navigateToOverview } from '../../actions/app'

import NewsOverviewTable from '../../containers/news/news-overview-table'

export default class News extends React.Component {

	componentWillMount() {
		this.props.dispatch(navigateToOverview(this.props.eventId))
	}

	render() {

		if (this.props.headerLoading) {
			return <div />
		}

		if (!this.props.initialized) {
			return <div>initializing news</div>
		}

		return (
			<div className="content">
				<p className="article-title">{ this.props.title }</p>
				<NewsOverviewTable />
			</div>
		)
	}
}