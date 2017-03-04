import React from 'react'
import Header from './Header'
import ContentWrapper from '../containers/content-wrapper'

import { initialize, setActiveEventBySlug } from '../actions/app'

import '../styles/main.scss'
import '../styles/header.scss'
import '../styles/footer.scss'
import '../styles/helpers.scss'
import '../styles/news-overview.scss'
import '../styles/expandable-item.scss'

import Footer from './Footer'

export default class App extends React.Component {

	componentWillMount() {
		this.props.dispatch(initialize(this.props.params))
	}

	componentWillReceiveProps(newProps) {
		if (this.props.params.eventSlug !== newProps.params.eventSlug) {
			newProps.dispatch(setActiveEventBySlug(newProps.params.eventSlug))
		}
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
				<ContentWrapper>
					{ this.props.children }
				</ContentWrapper>
				<Footer />
			</div>
		)
	}
}