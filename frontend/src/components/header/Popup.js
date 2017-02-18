import * as React from 'react'

import OnClickOutside from 'react-onclickoutside'

class Popup extends React.Component {

	render() {

		const {
			labels,
			selectedIndex,
			actions,
			hidden
		} = this.props

		if (hidden) {
			return <div/>
		}

		return (
			<div className="header-dropdown">
				{ 
					labels.map((label, index) => {

						const isSelected = index === selectedIndex
						const selectedClassName = isSelected ? ' selected' : ''
						const className = 'no-select pl-l'  + selectedClassName

						return (
							<div key={ index } className={ className } onClick={ actions[index] }>
							{ label }
						</div>
						)
					})
				}
			</div>
		)
	}

	handleClickOutside(e) {
		
		const isClickOnToggler = 
			e.target.className === this.props.ignoreOnClickOutsideClass || 
			e.target.parentNode.className.indexOf(this.props.ignoreOnClickOutsideClass) > -1

		if (!this.props.hidden && !isClickOnToggler) {
			this.props.onClickOutside()
		}
	}
}

export default OnClickOutside(Popup)