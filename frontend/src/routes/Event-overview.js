import * as React from 'react'

export default class GeneralLayout extends React.Component {

	render() {
		return <div>{ this.props.params.slug }</div>
	}
}