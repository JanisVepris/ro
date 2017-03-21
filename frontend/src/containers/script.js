import { connect } from 'react-redux'
import ScriptComponent from '../components/routes/Script'

import { navigateToCategory } from '../actions/header'
import { loadEventScript } from '../actions/events'

const mapStateToProps = (state) => {
	
	const { scriptById } = state.events
	const { activeEventId, eventsById } = state.app
	const eventName = eventsById[activeEventId].name

	const script = scriptById[activeEventId]

	return {
		title: eventName + ': Scenarijus',
		content: script && script.content,
		activeEventId
	}
}

export default connect(
	mapStateToProps,
	{
		navigateToCategory,
		loadEventScript
	},
	(stateProps, dispatchProps) => ({
		...stateProps,
		navigateToScript: () => dispatchProps.navigateToCategory('script'),
		loadScript: () => dispatchProps.loadEventScript(stateProps.activeEventId)
	})
)(ScriptComponent)
