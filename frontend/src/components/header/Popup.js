import * as React from 'react'

import OnClickOutside from 'react-onclickoutside'
import Collapse from 'react-collapse'

class Popup extends React.Component {

	render() {

		const {
			labels,
			selectedIndex,
			disabledEvents = [],
			actions,
			hidden
		} = this.props

		const className = 'header-dropdown' + (hidden ? ' hidden' : '')

		return (
			<div className={ className }>
				<Collapse isOpened={ !hidden } >
				{ 
					labels.map((label, index) => {

						const isSelected = index === selectedIndex
						const selectedClassName = isSelected ? ' selected' : ''
						const disabledClassName = disabledEvents[index] ? ' disabled' : ''
						const className = 'dropdown-option no-select pl-l' + selectedClassName + disabledClassName

						return (
							<div key={ index } className={ className } onClick={ () => { if (!disabledEvents[index]) actions[index]() } }>
							{ label }
						</div>
						)
					})
				}
				</Collapse>
			</div>
		)
	}

	handleClickOutside() {
		if (!this.props.hidden) {
			this.props.onClickOutside()
		}
	}
}

export default OnClickOutside(Popup)