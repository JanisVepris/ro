import * as React from 'react'
import '../../styles/main.scss'

const Button = ({
	labels,
	actions,
	hidden
}) => {

	if (hidden) {
		return <div/>
	}

	return (
		<div className="header-button">
			{ 
				labels.map((label, index) =>
					<div key={ index } onClick={ actions[index] }>
						{ label }
					</div>
				)
			}
		</div>
	)
}

export default Button
