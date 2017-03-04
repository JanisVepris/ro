import React from 'react'
import Spinner from './Spinner'

import Cover from '../containers/header/Cover'

export default class App extends React.Component {

	render() {

		const wrapperClassName = 'content-wrapper'
			+ (this.props.contentLoading ? '' : ' max-opacity opacity-animation')

		const containerStyle = {
			minHeight: '100vh'
		}

		return (
			<div style={ containerStyle }>
				<div className="content-spinner-container">
					<div className="content-spinner">
						{ (this.props.headerLoading || this.props.contentLoading) && <Spinner /> }
					</div>
				</div>

				<div className={ wrapperClassName }>
					<Cover />
					<div className="content">
						{ this.props.children }
					</div>
				</div>
				
			</div>
		)
	}
}