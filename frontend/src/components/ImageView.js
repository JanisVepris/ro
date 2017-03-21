import React from 'react'
import ImageLoader from 'react-imageloader'

import Spinner from './Spinner'

const ImageView = ({
	hidden,
	image,
	previousImage,
	nextImage,
	setActiveGalleryImage
}) => {

	if (hidden) {
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


export default ImageView