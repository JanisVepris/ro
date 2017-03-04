import * as React from 'react'
import ImageLoader from 'react-imageloader'

const Cover = ({
	url,
	onLoad
}) => {
	return (
		<div className='cover relative' onLoad={ onLoad }>
			<ImageLoader
				src={ url }
				wrapper={ React.DOM.div }>
			</ImageLoader>
		</div>
	)
}

export default Cover
