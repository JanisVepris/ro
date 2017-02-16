import { connect } from 'react-redux'
import { createSelector } from 'reselect'

import Popup from '../../components/header/Popup'

import { navigateToOverview } from '../../actions/app'
import { toggleEventsDropdown } from '../../actions/header'

const getEvents = (state) => state.app.eventsById

const getEventsLabels = createSelector(
	getEvents,
	(events) => Object.keys(events).reduce(
		(obj, event) => [
			events[event].name,
			...obj
		],
	[])
)

const getEventsIds = createSelector(
	getEvents,
	(events) => Object.keys(events).reduce(
		(obj, event) => [
			events[event].id,
			...obj
		],
	[])
)

const mapStateToProps = (state) => ({
	labels: getEventsLabels(state),
	ids: getEventsIds(state),
	selectedIndex: getEventsIds(state).indexOf(state.app.activeEventId),
	hidden: !state.header.isEventsDropdownVisible,
	ignoreOnClickOutsideClass: 'header-button'
})

export default connect(
	mapStateToProps,
	{
		navigateToOverview,
		onClickOutside: toggleEventsDropdown
	},
	(sp, dp) => ({
		...sp,
		...dp,
		actions: sp.ids.map(id => () => {
			dp.navigateToOverview(id)
			dp.onClickOutside()
		})
	})
)(Popup)


