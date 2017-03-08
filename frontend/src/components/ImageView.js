import React from 'react'
import ImageLoader from 'react-imageloader'

import Spinner from './Spinner'

const ImageView = ({
	hidden,
	image,
	previousImage,
	nextImage,
	setActiveGalleryImage,
	currentIndex
}) => {

	if (hidden) {
		return <div/>
	}

	return (
		<div className="image-view-container" onClick={ () => setActiveGalleryImage() }>
			<div onClick={ (e) => e.stopPropagation() }>
				<ImageLoader
					src={ image.url }
					preloader={ Spinner }
					className="image-view-main"
					
					/>
			</div>
		</div>
	)
}


export default ImageView