import React from 'react'
import { navigateToArticle } from '../../actions/articles'
import { navigateToCategory } from '../../actions/header'

export default class App extends React.Component {

	componentWillMount() {
		this.props.dispatch(navigateToCategory('article'))
		this.props.dispatch(navigateToArticle(this.props.params.articleSlug))
	}

	render() {
		return (
			<div>
				<label className="article-title">{ this.props.title }</label>
				<label className="article" style={{ display: 'block' }}>{ this.props.date }</label>
				<div className="article mt-xl" dangerouslySetInnerHTML={{ __html: this.props.content }} />
			</div>
		)
	}
}