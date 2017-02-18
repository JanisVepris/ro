import React from 'react'
import { loadVideoPlaylist } from '../actions/videos'

export default class App extends React.Component {

	componentWillMount() {
		this.props.dispatch(loadVideoPlaylist(this.props.videoPlaylistId))
	}

	render() {

		if (!this.props.initialized) {
			return <div>initializing video playlist</div>
		}

		return (
			<div className="content">
				<p className="article-title">{ this.props.title }</p>
			</div>
		)
	}
}