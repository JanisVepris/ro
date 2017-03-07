import React from 'react'
import { loadGallery } from '../../actions/galleries'
import { navigateToCategory } from '../../actions/header'

export default class Gallery extends React.Component {

	componentWillMount() {
		this.props.dispatch(navigateToCategory('gallery'))
		this.props.dispatch(loadGallery(this.props.galleryId))
	}

	render() {
		return (
			<div>
				<p className="article-title">{ this.props.title }</p>
				<div className="image-gallery">
					{
						this.props.items.map((item, index) => (
							<img key={ index } src={ item.thumbnail }/>
						))
					}
				</div>
			</div>
		)
	}
}