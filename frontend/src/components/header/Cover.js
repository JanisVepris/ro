import * as React from 'react'
import ImageLoader from 'react-imageloader'

const Cover = ({
	url,
	onLoad
}) => (
	<div className='cover'>
		<ImageLoader
			src={ url }
			wrapper={ React.DOM.div }
			preloader={ preloader }
			onLoad={ onLoad }>
		</ImageLoader>
	</div>
)

const preloader = () => {
	return <div>SPINNAH IMAGE</div>
}

export default Cover
