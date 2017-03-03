import React from 'react'
import { loadEventNews } from '../../actions/events'
import { setHeaderCover, navigateToCategory } from '../../actions/header'

import NewsOverviewTable from '../../containers/news/news-overview-table'

export default class News extends React.Component {

	componentWillMount() {
		this.props.dispatch(navigateToCategory('news'))
		this.props.dispatch(loadEventNews(this.props.eventId))
		this.props.dispatch(setHeaderCover(this.props.cover))
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