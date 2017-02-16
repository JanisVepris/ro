import * as React from 'react'
import '../../styles/main.scss'

const Button = ({
	label,
	onClick
}) => {

	return (
		<div className="header-button" onClick={ onClick }>
			{ label }
		</div>
	)
}

export default Button
