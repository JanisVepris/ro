import { connect } from 'react-redux'
import ContentWrapper from '../components/ContentWrapper'

// Reik selektoriaus kategorijom
const mapStateToProps = (state) => {

	const headerLoading = state.header.loading
	const activeCategory = state.app.activeCategory
	const { activeEventId } = state.app

	let contentLoading = true
	
	if (activeCategory === 'news') {
		contentLoading = !state.events.newsById[activeEventId]
	} else 
	if (activeCategory === 'article') {
		contentLoading = !state.events.articleById[state.events.activeArticle]
	} else 	
	if (activeCategory === 'videos') {
		contentLoading = !state.videos.byId[state.events.byId[activeEventId].videoPlaylistId]
	} else 
	if (activeCategory === 'gallery') {
		contentLoading = !state.galleries.byId[state.events.byId[activeEventId].galleryId]
	}

	return {
		headerLoading,
		contentLoading
	}
}

export default connect(
	mapStateToProps
)(ContentWrapper)
