import React from 'react'
import SmoothCollapse from 'react-smooth-collapse'

export default class ExpandableItem extends React.Component {

	constructor() {

		super()
		this.state = {
			expanded: false
		}
	}  

	render() {
		return (
			<div className="expandable-item-container">
				<p className="expandable-item-title" onClick={ () => this.toggle() }>
					{ this.props.title }
				</p>
				<SmoothCollapse expanded={ this.state.expanded }>
					<div className="expandable-item-content">
						{ this.props.content }
						{ this.props.children }
					</div>
				</SmoothCollapse>
			</div>
		)
	}

	toggle() {
		this.setState({
			expanded: !this.state.expanded
		})
	}
}