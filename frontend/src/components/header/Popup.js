import * as React from 'react'
import '../../styles/main.scss'

const Button = ({
	labels,
	selectedIndex,
	actions,
	hidden
}) => {

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

export default Button
