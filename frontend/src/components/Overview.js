import * as React from 'react'

const Overview = ({
	initialized,
	id
}) => {

	if (!initialized) {
		return <div>Loading overview</div>
	}

	return (
		<div>
			Overview of event { id }
		</div>
	)
}

export default Overview