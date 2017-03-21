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

				{ this.props.playlist && this.props.playlist.map((song, index) => (
					<div key={ index } className="expandable-item-container transparent mt" style={{ maxWidth: 500 }}>
						<p className="expandable-item-title ellipsis">{ song.title }</p>
						<audio src={ song.url } controls style={{ width: '100%' }}>
							Jūsų naršyklė nepalaiko mp3 perklausos
						</audio>
					</div>
				))}
			</div>
		)
	}
}