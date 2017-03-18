import { connect } from 'react-redux'
import PosterComponent from '../components/routes/Poster'

import { navigateToCategory } from '../actions/header'
import { loadEventPoster } from '../actions/events'

const mapStateToProps = (state) => {
	
	const { posterById } = state.events
	const { activeEventId, eventsById } = state.app
	const eventName = eventsById[activeEventId].name

	const poster = posterById[activeEventId]

	return {
		title: eventName + ': Plakatas',
		posterUrl: poster && poster.url,
		activeEventId
	}
}

export default connect(
	mapStateToProps, 
	{
		navigateToCategory,
		loadEventPoster
	},
	(stateProps, dispatchProps) => ({
		...stateProps,
		navigateToPoster: () => dispatchProps.navigateToCategory('poster'),
		loadPoster: () => dispatchProps.loadEventPoster(stateProps.activeEventId)
	})
)(PosterComponent)
