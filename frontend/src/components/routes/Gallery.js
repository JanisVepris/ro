import React from 'react'
import { loadGallery } from '../../actions/galleries'
import { navigateToCategory } from '../../actions/header'

export default class Gallery extends React.Component {

	componentWillMount() {
		this.props.dispatch(navigateToCategory('gallery'))
		this.props.dispatch(loadGallery(this.props.galleryId))
	}

	render() {
		return (
			<div>
				galerija
			</div>
		)
	}
}