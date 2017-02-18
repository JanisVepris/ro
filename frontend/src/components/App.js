import React from 'react'
import Header from './Header'
import { initialize } from '../actions/app'

import '../styles/main.scss'
import '../styles/header.scss'
import '../styles/helpers.scss'

export default class App extends React.Component {

	componentWillMount() {
		this.props.dispatch(initialize(this.props.params))
	}

	render() {

		if (!this.props.initialized) {
			return <div>initializing</div>
		}

		return (
			<div>
				<Header />
				{ this.props.children }
			</div>
		)
	}
}