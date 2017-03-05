import * as React from 'react'

import OnClickOutside from 'react-onclickoutside'
import SmoothCollapse from 'react-smooth-collapse'

class Popup extends React.Component {

	render() {

		const {
			labels,
			selectedIndex,
			actions,
			hidden
		} = this.props

		const className = 'header-dropdown' + (hidden ? ' hidden' : '')

		return (
				<div className={ className }>
					<SmoothCollapse expanded={ !hidden }>
					{ 
						labels.map((label, index) => {

							const isSelected = index === selectedIndex
							const selectedClassName = isSelected ? ' selected' : ''
							const className = 'dropdown-option no-select pl-l'  + selectedClassName

							return (
								<div key={ index } className={ className } onClick={ actions[index] }>
								{ label }
							</div>
							)
						})
					}
					</SmoothCollapse>
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