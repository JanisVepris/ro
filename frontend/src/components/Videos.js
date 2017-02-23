import React from 'react'

import ExpandableItem from './ExpandableItem'
import ReactPlayer from 'react-player'

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
				{ this.props.videos.map((video, index) => 
					<ExpandableItem key={ index } title={ video.title }>
						<div className="expandable-item-video-max-width">
							<div className="expandable-item-video-wrapper">
								<ReactPlayer 
									url={ video.url }
									controls={ true }
									className='expandable-item-video'
									width={ 'auto' }
									height={ 'auto' }
									/>
							</div>
						</div>
					</ExpandableItem>
				)}
			</div>
		)
	}
}