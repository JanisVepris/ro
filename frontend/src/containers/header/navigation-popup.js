import { connect } from 'react-redux'
import { createSelector } from 'reselect'
import Config from '../../config'

import Popup from '../../components/header/Popup'

import { navigateToCategory } from '../../actions/header' 
import { toggleNavigationDropdown } from '../../actions/header'

const getEventInfo = (state) => state.events.byId[state.app.activeEventId]

const getAvailableCategories = createSelector(
	getEventInfo,
	(eventInfo) => {

		const options = ['news']

		if (eventInfo.galleryId) {
			options.push('gallery')
		}

		if (eventInfo.videoPlaylistId) {
			options.push('videos')
		}

		if (eventInfo.hasFacts) {
			options.push('facts')
		}

		if (eventInfo.hasTeam) {
			options.push('team')
		}

		if (eventInfo.hasScript) {
			options.push('script')
		}

		if (eventInfo.hasPoster) {
			options.push('poster')
		}

		if (eventInfo.hasAudioPlaylist) {
			options.push('playlist')
		}

		return options
	}
)

const mapStateToProps = (state) => ({
	labels: getAvailableCategories(state).map(category => Config.categories[category].title),
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


