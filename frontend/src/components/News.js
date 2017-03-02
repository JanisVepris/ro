import React from 'react'
import { loadEventNews } from '../actions/events'

import NewsOverviewTable from '../containers/news/news-overview-table'

export default class App extends React.Component {

	componentWillMount() {
		this.props.dispatch(loadEventNews(this.props.eventId))
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
				<NewsOverviewTable />
			</div>
		)
	}
}