import React from 'react'

import ExpandableItem from './../ExpandableItem'
import ReactPlayer from 'react-player'
import Spinner from '../Spinner'

import { loadVideoPlaylist } from '../../actions/videos'
import { navigateToCategory } from '../../actions/header'

export default class Videos extends React.Component {

	componentWillMount() {
		this.props.dispatch(navigateToCategory('videos'))
		this.props.dispatch(loadVideoPlaylist(this.props.videoPlaylistId))
	}

	render() {

		if (!this.props.headerLoading && this.props.videosLoading) {
			return <Spinner />
		}
		
		const contentClassName = 'content'
			+ (this.props.videosLoading || this.props.headerLoading ? '' : ' max-opacity opacity-animation')

		return (
			<div className={ contentClassName }>
				<p className="article-title">{ this.props.title }</p>
				{ this.props.initialized && this.props.videos.map((video, index) => 
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