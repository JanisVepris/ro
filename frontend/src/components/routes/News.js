import React from 'react'
import { navigateToOverview } from '../../actions/app'
import Spinner from '../Spinner'

import NewsOverviewTable from '../../containers/news/news-overview-table'

export default class News extends React.Component {

	componentWillMount() {
		this.props.dispatch(navigateToOverview(this.props.eventId))
	}

	render() {

		if (!this.props.headerLoading && this.props.newsLoading) {
			return <Spinner />
		}

		const contentClassName = 'content'
			+ (this.props.headerLoading || this.props.newsLoading ? '' : ' max-opacity opacity-animation')

		return (
			<div className={ contentClassName }>
				<p className="article-title">{ this.props.title }</p>
				<NewsOverviewTable />
			</div>
		)
	}
}