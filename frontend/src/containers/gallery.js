import { connect } from 'react-redux'
import GalleryComponent from '../components/Gallery'

const mapStateToProps = (state) => {
	
	const activeEventId = state.app.activeEventId
	const activeGalleryId = state.events.byId[activeEventId].galleryId
	const urls = state.galleries.byId[activeGalleryId]

	return {
		initialized: !!urls,
		galleryId: activeGalleryId,
		ids: urls && urls.length
	}
}

export default connect(
	mapStateToProps
)(GalleryComponent)
