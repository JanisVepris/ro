import { connect } from 'react-redux'

import Button from '../../components/header/Button'

import { toggleEventsDropdown } from '../../actions/header'

const mapStateToProps = () => ({
	label: 'MIDI ROKO OPERA'
})

export default connect(
	mapStateToProps,
	{
		onClick: toggleEventsDropdown
	}
)(Button)
