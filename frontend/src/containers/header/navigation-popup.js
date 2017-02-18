import { connect } from 'react-redux'
import { createSelector } from 'reselect'

import Popup from '../../components/header/Popup'

import { setActiveCategory } from '../../actions/app' 
import { toggleNavigationDropdown } from '../../actions/header'

const getEventInfo = (state) => state.events.byId[state.app.activeEventId]
const getCategories = (state) => state.app.categories

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
		return Object.keys(categories).map(category => categories[category])
	}
)

const mapStateToProps = (state) => ({
	labels: getCategoriesNames(state),
	categories: getAvailableCategories(state),
	selectedIndex: getAvailableCategories(state).indexOf(state.app.activeCategory),
	hidden: !state.header.isNavigationDropdownVisible,
	ignoreOnClickOutsideClass: 'header-button'
})

export default connect(
	mapStateToProps,
	{
		setActiveCategory,
		onClickOutside: toggleNavigationDropdown
	},
	(sp, dp) => ({
		...sp,
		...dp,
		actions: sp.categories.map(category => () => {
			dp.setActiveCategory(category)
			dp.onClickOutside()
		})
	})
)(Popup)


