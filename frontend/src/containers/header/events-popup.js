import { connect } from 'react-redux'

import Popup from '../../components/header/Popup'

import { navigateToOverview } from '../../actions/app'

import { createSelector } from 'reselect'

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
	hidden: false
})

export default connect(
	mapStateToProps,
	{
		navigateToOverview
	},
	(sp, dp) => ({
		...sp,
		actions: sp.ids.map(id => () => dp.navigateToOverview(id))
	})
)(Popup)


