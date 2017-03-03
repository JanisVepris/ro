import * as React from 'react'
import ImageLoader from 'react-imageloader'
import Spinner from '../Spinner.js'

const Cover = ({
	url,
	isLoading,
	onLoad
}) => {

	const imageStyle = {
		visibility: isLoading ? 'hidden' : 'visible'
	}

	const coverStyle = {
		minHeight: isLoading ? '100vh' : 'auto'
	}

	return (
		<div className='cover relative' style={ coverStyle }>

			{ isLoading && <Spinner /> }

			<ImageLoader
				src={ url }
				wrapper={ React.DOM.div }
				onLoad={ onLoad }
				style={ imageStyle }>
			</ImageLoader>
		</div>
	)
}

export default Cover
