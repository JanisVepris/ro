import * as React from 'react'
import ImageLoader from 'react-imageloader'

const Cover = ({
	url,
	onLoad
}) => {
	return (
		<div className='cover relative'>
			<ImageLoader
				src={ url }
				wrapper={ React.DOM.div }
				onLoad={ onLoad }>
			</ImageLoader>
		</div>
	)
}

export default Cover
