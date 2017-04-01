import { connect } from 'react-redux'
import TeamComponent from '../components/routes/Team'

import { navigateToCategory } from '../actions/header'
import { loadEventTeam } from '../actions/events'

const mapStateToProps = (state) => {
	
	const { teamById } = state.events
	const { activeEventId, eventsById } = state.app
	const eventName = eventsById[activeEventId].title

	const team = teamById[activeEventId]

	return {
		title: eventName + ': Komanda',
		content: team && team.content,
		activeEventId
	}
}

export default connect(
	mapStateToProps,
	{
		navigateToCategory,
		loadEventTeam
	},
	(stateProps, dispatchProps) => ({
		...stateProps,
		navigateToTeam: () => dispatchProps.navigateToCategory('team'),
		loadTeam: () => dispatchProps.loadEventTeam(stateProps.activeEventId)
	})
)(TeamComponent)
