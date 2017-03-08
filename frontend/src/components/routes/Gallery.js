import React from 'react'

import ImageView from '../../containers/image-view'

export default class Gallery extends React.Component {

	componentWillMount() {
		this.props.navigateToCategory('gallery')
		this.props.loadGallery(this.props.galleryId)
	}

	render() {
		return (
			<div>
				<p className="article-title">{ this.props.title }</p>
				<div className="image-gallery">
					{
						this.props.items.map((item, index) => (
							<div key={ index } className="image-gallery-img-container">
								<img src={ item.thumbnail } onClick={ () => this.props.setActiveGalleryImage(index) }/>
							</div>
						))
					}
				</div>
				<ImageView galleryId={ this.props.galleryId }/>
			</div>
		)
	}
}