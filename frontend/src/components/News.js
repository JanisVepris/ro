import React from 'react'
import { loadEventNews } from '../actions/events'

export default class App extends React.Component {

	componentWillMount() {
		this.props.dispatch(loadEventNews(this.props.eventId))
	}

	render() {

		if (!this.props.initialized) {
			return <div>initializing news</div>
		}

		return (
			<div>
				{ this.props.ids }
			</div>
		)
	}
}