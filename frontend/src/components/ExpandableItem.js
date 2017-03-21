import React from 'react'
import Collapse from 'react-collapse'

export default class ExpandableItem extends React.Component {

	constructor() {

		super()
		this.state = {
			expanded: false,
			height: null,
			expandRested: false
		}
	}  

	render() {

		const containerStyle = this.state.height
			? { height: this.state.height + 42 }
			: { height: 'auto' }

		const contentClassName = 'expandable-item-content' + ( this.state.expandRested
			? ' max-opacity opacity-animation'
			: ''
		)

		return (
			<div className="mb" style={ containerStyle }>
				<div className="expandable-item-container">
					<p className="expandable-item-title" onClick={ () => this.toggle() }>
						{ this.props.title }
					</p>
					<Collapse isOpened={ this.state.expanded } onHeightReady={ (h) => this.setHeight(h)} onRest={ () => this.onExpandRest() }>
						<div className={ contentClassName }>
							{ this.props.content }
							{ this.props.children }
						</div>
					</Collapse>
				</div>
			</div>
		)
	}

	toggle() {
		this.setState({
			...this.state,
			expanded: !this.state.expanded
		})
	}

	setHeight(height) {
		this.setState({
			...this.state,
			height
		})
	}

	onExpandRest() {
		this.setState({
			...this.state,
			expandRested: !!this.state.height
		})
	}
}