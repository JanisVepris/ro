import { connect } from 'react-redux'
import Config from '../../config'
import Button from '../../components/header/Button'
import { toggleNavigationDropdown } from '../../actions/header'

const mapStateToProps = (state) => {
	
	const activeCategory = state.app.activeCategory || 'news'

	return {
		label: Config.categories[activeCategory].title,
		expanded: state.header.isNavigationDropdownVisible,
		mobile: true
	}
}

export default connect(
	mapStateToProps,
	{
		onClick: toggleNavigationDropdown
	}
)(Button)
