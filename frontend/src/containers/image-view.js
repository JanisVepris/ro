import { connect } from 'react-redux'
import ImageView from '../components/ImageView'

import { setActiveGalleryImage } from '../actions/galleries'

const mapStateToProps = (_state, ownProps) => (state) => {

	const activeGallery = state.galleries.byId[ownProps.galleryId]
	const image = activeGallery && activeGallery.items[state.galleries.activeImageIndex] || {}
	const previousImage = activeGallery && activeGallery.items[state.galleries.activeImageIndex - 1] || {}
	const nextImage = activeGallery && activeGallery.items[state.galleries.activeImageIndex + 1] || {}
	
	return {
		hidden: !activeGallery || state.galleries.activeImageIndex === null,
		currentIndex: state.galleries.activeImageIndex,
		image,
		previousImage,
		nextImage
	}
}

export default connect(
	mapStateToProps,
	{
		setActiveGalleryImage
	}
)(ImageView)
