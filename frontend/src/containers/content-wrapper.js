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
	if (activeCategory === 'articles') {
		contentLoading = !state.events.articleById[state.events.activeArticle]
	} else 	
	if (activeCategory === 'videos') {
		contentLoading = !state.videos.byId[activeEventId]
	} else 
	if (activeCategory === 'gallery') {
		contentLoading = !state.galleries.byId[activeEventId]
	} else 
	if (activeCategory === 'script') {
		contentLoading = !state.events.scriptById[activeEventId]
	} else 
	if (activeCategory === 'facts') {
		contentLoading = !state.events.factsById[activeEventId]
	} else 
	if (activeCategory === 'team') {
		contentLoading = !state.events.teamById[activeEventId]
	} else 
	if (activeCategory === 'poster') {
		contentLoading = !state.events.posterById[activeEventId]
	} else 
	if (activeCategory === 'playlist') {
		contentLoading = !state.events.playlistById[activeEventId]
	}

	return {
		headerLoading,
		contentLoading,
		activeCategory: state.app.activeCategory
	}
}

export default connect(
	mapStateToProps
)(ContentWrapper)
