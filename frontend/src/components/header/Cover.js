import * as React from 'react'
import ImageLoader from 'react-imageloader'
import Spinner from '../Spinner.js'

const Cover = ({
	url,
	isLoading,
	onLoad
}) => {

	const coverStyle = {
		visibility: isLoading ? 'hidden' : 'visible'
	}

	return (
		<div className='cover'>

			{ isLoading && <Spinner />}

			<ImageLoader
				src={ url }
				wrapper={ React.DOM.div }
				onLoad={ onLoad }
				style={ coverStyle }>
			</ImageLoader>
		</div>
	)
}

export default Cover
