import { connect } from 'react-redux'
import ImageView from '../components/ImageView'

import { setActiveGalleryImage } from '../actions/galleries'

const mapStateToProps = (_state, ownProps) => (state) => {
	
	const previousIndex = state.galleries.activeImageIndex - 1
	const nextIndex = state.galleries.activeImageIndex + 1

	const activeGallery = state.galleries.byId[ownProps.galleryId]
	const image = activeGallery && activeGallery.items[state.galleries.activeImageIndex] || {}
	const previousImage = activeGallery && activeGallery.items[previousIndex] && previousIndex
	const nextImage = activeGallery && activeGallery.items[nextIndex] && nextIndex
	
	return {
		hidden: !activeGallery || state.galleries.activeImageIndex === null,
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
