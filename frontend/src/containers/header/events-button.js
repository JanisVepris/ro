import { connect } from 'react-redux'

import Button from '../../components/header/Button'

import { toggleEventsDropdown } from '../../actions/header'

const mapStateToProps = (state) => ({
	label: state.app.eventsById[state.app.activeEventId].name,
	expanded: state.header.isEventsDropdownVisible
})

export default connect(
	mapStateToProps,
	{
		onClick: toggleEventsDropdown
	}
)(Button)
