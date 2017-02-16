import * as React from 'react'
import '../../styles/main.scss'

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
						const selectedClassName = isSelected ? 'selected' : ''

						return (
							<div key={ index } className={ selectedClassName } onClick={ actions[index] }>
							{ label }
						</div>
						)
					})
				}
			</div>
		)
	}

	handleClickOutside(e) {
		if (!this.props.hidden && e.target.className !== this.props.ignoreOnClickOutsideClass) {
			this.props.onClickOutside()
		}
	}
}

export default OnClickOutside(Popup)