import { connect } from 'react-redux'
import { createSelector } from 'reselect'
import Config from '../../config'

import Popup from '../../components/header/Popup'

import { navigateToCategory } from '../../actions/header' 
import { toggleNavigationDropdown } from '../../actions/header'

const getEventInfo = (state) => state.events.byId[state.app.activeEventId]
const getCategories = () => Config.categories

const getAvailableCategories = createSelector(
	getEventInfo,
	(eventInfo) => {

		const options = ['news']

		if (eventInfo.galleryId) {
			options.push('gallery')
		}

		return options
	}
)

const getCategoriesNames = createSelector(
	getCategories,
	(categories) => {
		return Object.keys(categories).map(category => categories[category].title)
	}
)

const mapStateToProps = (state) => ({
	labels: getCategoriesNames(state),
	categories: getAvailableCategories(state),
	selectedIndex: getAvailableCategories(state).indexOf(state.app.activeCategory),
	hidden: !state.header.isNavigationDropdownVisible,
	outsideClickIgnoreClass: 'header-categories'
})

export default connect(
	mapStateToProps,
	{
		navigateToCategory,
		onClickOutside: toggleNavigationDropdown
	},
	(sp, dp) => ({
		...sp,
		...dp,
		actions: sp.categories.map(category => () => {
			dp.navigateToCategory(category)
			dp.onClickOutside()
		})
	})
)(Popup)


