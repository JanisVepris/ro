import { connect } from 'react-redux'
import GalleryComponent from '../components/routes/Gallery'

import { setActiveGalleryImage, loadGallery } from '../actions/galleries'
import { navigateToCategory } from '../actions/header'

const mapStateToProps = (state) => {
	
	const activeEventId = state.app.activeEventId
	const activeGalleryId = state.events.byId[activeEventId].galleryId
	const activeGallery = state.galleries.byId[activeGalleryId]
	const items = activeGallery && activeGallery.items || []
	const eventName = state.app.eventsById[activeEventId].name

	return {
		galleryLoading: !activeGallery,
		galleryId: activeGalleryId,
		items,
		title: eventName + ': Galerija',
	}
}

export default connect(
	mapStateToProps,
	{
		setActiveGalleryImage,
		loadGallery,
		navigateToCategory
	}
)(GalleryComponent)
