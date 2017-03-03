import React from 'react'
import Header from './Header'

import { initialize, setActiveEventBySlug } from '../actions/app'

import '../styles/main.scss'
import '../styles/header.scss'
import '../styles/footer.scss'
import '../styles/helpers.scss'
import '../styles/news-overview.scss'
import '../styles/expandable-item.scss'

import Cover from '../containers/header/Cover'
import Footer from './Footer'

export default class App extends React.Component {

	componentWillMount() {
		this.props.dispatch(initialize(this.props.params))
	}

	componentWillReceiveProps(newProps) {
		newProps.dispatch(setActiveEventBySlug(newProps.params.eventSlug))
	}

	render() {

		if (!this.props.initialized) {
			return (
				<div />
			)
		}

		return (
			<div>
				<Header />
				<Cover />
				{ this.props.children }
				<Footer />
			</div>
		)
	}
}