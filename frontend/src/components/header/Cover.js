import * as React from 'react'
import ImageLoader from 'react-imageloader'
import Spinner from '../Spinner.js'

const Cover = ({
	url,
	isLoading,
	onLoad
}) => {

	const coverStyle = {
		minHeight: isLoading ? '100vh' : 'auto'
	}

	return (
		<div className='cover relative' style={ coverStyle }>

			{ isLoading && <Spinner /> }

			<ImageLoader
				className={ isLoading ? 'min-opacity' : 'max-opacity opacity-animation'}
				src={ url }
				wrapper={ React.DOM.div }
				onLoad={ onLoad }>
			</ImageLoader>
		</div>
	)
}

export default Cover
