import React from 'react'
import { navigateToArticle } from '../../actions/articles'
import { navigateToCategory } from '../../actions/header'
import Spinner from '../Spinner'

export default class App extends React.Component {

	componentWillMount() {
		this.props.dispatch(navigateToCategory('article'))
		this.props.dispatch(navigateToArticle(this.props.params.articleSlug))
	}

	render() {

		if (this.props.headerLoading) {
			return <div />
		}

		if (this.props.articleLoading) {
			return <Spinner />
		}

		return (
			<div className="content">
				{ this.props.title }
			</div>
		)
	}
}