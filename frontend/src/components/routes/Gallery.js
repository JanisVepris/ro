import React from 'react'
import { loadGallery } from '../../actions/galleries'
import { navigateToCategory } from '../../actions/header'
import Spinner from '../Spinner'

export default class Gallery extends React.Component {

	componentWillMount() {
		this.props.dispatch(navigateToCategory('gallery'))
		this.props.dispatch(loadGallery(this.props.galleryId))
	}

	render() {
		
		if (!this.props.headerLoading && this.props.galleryLoading) {
			return (
				<div className="content-spinner">
					<Spinner />
				</div>
			)
		}

		const contentClassName = 'content'
			+ (this.props.galleryLoading || this.props.headerLoading ? '' : ' max-opacity opacity-animation')

		return (
			<div className={ contentClassName }>
				galerija
			</div>
		)
	}
}