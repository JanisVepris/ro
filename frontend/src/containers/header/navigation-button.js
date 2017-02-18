import { connect } from 'react-redux'
import Config from '../../config'

import Button from '../../components/header/Button'

import { toggleNavigationDropdown } from '../../actions/header'

const mapStateToProps = (state) => ({
	label: Config.categories[state.app.activeCategory].title,
	expanded: state.header.isNavigationDropdownVisible
})

export default connect(
	mapStateToProps,
	{
		onClick: toggleNavigationDropdown
	}
)(Button)
