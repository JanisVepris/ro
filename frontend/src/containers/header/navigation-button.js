import { connect } from 'react-redux'

import Button from '../../components/header/Button'

import { toggleNavigationDropdown } from '../../actions/header'

const mapStateToProps = (state) => ({
	label: state.app.categories[state.app.activeCategory],
	expanded: state.header.isNavigationDropdownVisible
})

export default connect(
	mapStateToProps,
	{
		onClick: toggleNavigationDropdown
	}
)(Button)
