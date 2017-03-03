import { connect } from 'react-redux'
import ContentWrapper from '../components/ContentWrapper'

const mapStateToProps = (state) => {

	const headerLoading = state.header.loading
	const activeCategory = state.app.activeCategory
	const { activeEventId } = state.app

	let contentLoading

	if (activeCategory === 'news') {
		contentLoading = headerLoading || !state.events.newsById[activeEventId]
	} else 
	if (activeCategory === 'article') {
		contentLoading = headerLoading || !state.events.articleById[state.app.activeArticle]
	} else 	
	if (activeCategory === 'videos') {
		contentLoading = headerLoading || !state.videos.byId[state.events.byId[activeEventId].videoPlaylistId]
	} else 
	if (activeCategory === 'gallery') {
		contentLoading = headerLoading || !state.galleries.byId[state.events.byId[activeEventId].galleryId]
	}

	return {
		contentLoading
	}
}

export default connect(
	mapStateToProps
)(ContentWrapper)
