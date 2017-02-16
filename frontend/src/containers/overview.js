import { connect } from 'react-redux'

import OverviewComponent from '../components/Overview'

const mapStateToProps = (state) => {
	
	const activeEventId = state.app.activeEventId

	return {
		initialized: !!state.events.byId[activeEventId],
		id: activeEventId
	}
}

export default connect(
	mapStateToProps
)(OverviewComponent)
