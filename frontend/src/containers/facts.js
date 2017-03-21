import { connect } from 'react-redux'
import FactsComponent from '../components/routes/Facts'

import { navigateToCategory } from '../actions/header'
import { loadEventFacts } from '../actions/events'

const mapStateToProps = (state) => {
	
	const { factsById } = state.events
	const { activeEventId, eventsById } = state.app
	const eventName = eventsById[activeEventId].name

	const facts = factsById[activeEventId]

	return {
		title: eventName + ': Įdomus faktai',
		content: facts && facts.content,
		activeEventId
	}
}

export default connect(
	mapStateToProps, 
	{
		navigateToCategory,
		loadEventFacts
	},
	(stateProps, dispatchProps) => ({
		...stateProps,
		navigateToFacts: () => dispatchProps.navigateToCategory('facts'),
		loadFacts: () => dispatchProps.loadEventFacts(stateProps.activeEventId)
	})
)(FactsComponent)
