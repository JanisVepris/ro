import { connect } from 'react-redux'
import { createSelector } from 'reselect'

import Popup from '../../components/header/Popup'

import { navigateToOverview } from '../../actions/app'
import { toggleEventsDropdown } from '../../actions/header'

const getEvents = (state) => state.app.eventsById
const getEventsIds = (state) => state.app.eventsIds

const getEventsLabels = createSelector(
	getEventsIds,
	getEvents,
	(eventsIds, events) => eventsIds.map(id => events[id].title)
)

const getDisabledEvents = createSelector(
	getEventsIds,
	getEvents,
	(eventsIds, events) => eventsIds.map(id => events[id].isDisabled)
)

const mapStateToProps = (state) => ({
	labels: getEventsLabels(state),
	ids: state.app.eventsIds,
	selectedIndex: state.app.eventsIds.indexOf(state.app.activeEventId),
	disabledEvents: getDisabledEvents(state),
	hidden: !state.header.isEventsDropdownVisible,
	outsideClickIgnoreClass: 'header-events'
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


