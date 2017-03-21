import React from 'react'
import ImageLoader from 'react-imageloader'
import Spinner from '../Spinner'

export default class App extends React.Component {

	componentWillMount() {
		this.props.navigateToPoster()
		this.props.loadPoster()
	}

	render() {
		return (
			<div>
				<label className="article-title">{ this.props.title }</label>

				<ImageLoader
						src={ this.props.posterUrl }
						wrapper={React.DOM.div}
						preloader={ Spinner }
						/>

			</div>
		)
	}
}