import React from 'react'

export default class App extends React.Component {

	render() {
		return (
			<div className="test">
				{ this.props.children }
			</div>
		)
	}
}
