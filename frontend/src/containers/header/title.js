import { connect } from 'react-redux'
import { navigateToOverview } from '../../actions/app'

import Title from '../../components/header/title'

const mapStateToProps = ({ app, header }) => ({
	id: app.defaultEventId,
	disabled: 
		app.defaultEventId === app.activeEventId && app.activeCategory === 'news' ||
		!app.initialized ||
		header.loading
})

export default connect(
	mapStateToProps,
	{
		onClick: navigateToOverview
	},
	({ disabled, id }, dispatchProps) => ({
		disabled,
		onClick: () => !disabled && dispatchProps.onClick(id)
	})
)(Title)
