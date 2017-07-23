import * as React from 'react'

const Title = ({
	onClick,
	disabled
}) => (
	<div className="header-title-wrapper">
		<div className={ "header-title" + ( disabled ? ' disabled' : '' )} onClick={ () => onClick() }>
			MIDI ROKO OPEROS
		</div>
	</div>
)

export default Title
