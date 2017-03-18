import React from 'react'

export default class App extends React.Component {

	componentWillMount() {
		this.props.navigateToScript()
		this.props.loadScript()
	}

	render() {
		return (
			<div>
				<label className="article-title">{ this.props.title }</label>
				<div className="article" dangerouslySetInnerHTML={{ __html: this.props.content }} />
			</div>
		)
	}
}