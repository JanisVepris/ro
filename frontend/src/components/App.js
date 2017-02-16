import React from 'react'
import store from '../store'

import Header from './Header'

import { initialize } from '../actions/app'

export default class App extends React.Component {

	componentWillMount() {
		store.dispatch(initialize(this.props.params))
	}

	render() {
		return (
			<div>
				<Header />
				{ this.props.children }
			</div>
		)
	}
}
