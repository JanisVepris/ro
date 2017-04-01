import React from 'react'
import ImageLoader from 'react-imageloader'

import Spinner from './Spinner'

export default class ImageView extends React.Component {

	// handleKeyDown(event) {
	// 	if (event.keyCode === 27) {
	// 		console.log(this)
	// 		this.props.setActiveGalleryImage()
	// 	}
	// }

	render() {

		const {
			hidden,
			image,
			previousImage,
			nextImage,
			setActiveGalleryImage
		} = this.props

		// document.body.addEventListener('keydown', this.handleKeyDown)

		if (hidden) {
			//document.body.removeEventListener('keydown', this.handleKeyDown)
			return <div/>
		}

		return (
			<div className="image-view-container" onClick={ () => setActiveGalleryImage() }>
				<div className="image-view-main">
					<div className="arrow-container" onClick={ (e) => e.stopPropagation() }>

						{ previousImage > -1 && 
							<div className="arrow-left" onClick={ () => setActiveGalleryImage(previousImage) }>
								<img />
							</div>
						}

						<ImageLoader
							src={ image.url }
							wrapper={React.DOM.div}
							preloader={ Spinner }
							/>

						{ !!nextImage && 
							<div className="arrow-right" onClick={ () => setActiveGalleryImage(nextImage) }>
								<img />
							</div>
						}

					</div>
				</div>
			</div>
		)
	}
}
