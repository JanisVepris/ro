import { connect } from 'react-redux'
import GalleryComponent from '../components/routes/Gallery'

import { setActiveGalleryImage, loadGallery } from '../actions/galleries'
import { navigateToCategory } from '../actions/header'

const mapStateToProps = (state) => {
	
	const activeEventId = state.app.activeEventId
	const activeGallery = state.galleries.byId[activeEventId]
	const items = activeGallery && activeGallery.items || []
	const eventName = state.app.eventsById[activeEventId].name

	return {
		galleryLoading: !activeGallery,
		galleryId: activeEventId,
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
