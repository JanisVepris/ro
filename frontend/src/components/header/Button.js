import * as React from 'react'

const Button = ({
	label,
	onClick
}) => {

	return (
		<div className="header-button no-select" onClick={ onClick }>
			<label>{ label }</label>
			<i className="arrow ml" />
		</div>
	)
}

export default Button
