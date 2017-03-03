import React from 'react'

import { navigateToArticle } from '../actions/articles'

export default class App extends React.Component {

	componentWillMount() {
		this.props.dispatch(navigateToArticle(this.props.params.articleSlug))
	}

	render() {

		if (this.props.headerLoading) {
			return <div />
		}

		if (this.props.articleLoading) {
			return <div>initializing article</div>
		}

		return (
			<div className="content">
				{ this.props.title }
			</div>
		)
	}
}