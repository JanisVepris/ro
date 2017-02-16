import * as React from 'react'
import '../../styles/main.scss'

const Button = ({
	label,
	onClick
}) => {

	return (
		<div className="header-button" onClick={ onClick }>
			{ label }
			<i className="arrow mr-s" />
		</div>
	)
}

export default Button
