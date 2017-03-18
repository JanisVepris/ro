import React from 'react'

export default class App extends React.Component {

	componentWillMount() {
		this.props.navigateToPlaylist()
		this.props.loadPlaylist()
	}

	render() {
		return (
			<div>
				<label className="article-title">{ this.props.title }</label>

				{ this.props.playlist }
			</div>
		)
	}
}