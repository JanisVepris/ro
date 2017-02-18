import React from 'react'
import { loadGallery } from '../actions/galleries'

export default class App extends React.Component {

	componentWillMount() {
		this.props.dispatch(loadGallery(this.props.galleryId))
	}

	render() {

		if (!this.props.initialized) {
			return <div>initializing gallery</div>
		}

		return (
			<div>
				galerija
			</div>
		)
	}
}