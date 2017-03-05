import * as React from 'react'

const Button = ({
	label,
	onClick,
	expanded,
	mobile
}) => {

	const className = 'header-button no-select' + (expanded ? ' expanded' : '')

	return (
		<div className={ className } onClick={ onClick }>
			<label>{ label }</label>
			<i className="arrow ml" />
			{ mobile &&
				<div className="mobile-navigation-button">
					<div className="bar1"></div>
					<div className="bar2"></div>
					<div className="bar3"></div>
				</div>
			}
		</div>
	)
}

export default Button
