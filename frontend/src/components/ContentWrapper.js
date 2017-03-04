import React from 'react'
import Spinner from './Spinner'

import Cover from '../containers/header/Cover'

export default class App extends React.Component {

	constructor(props) {
		super(props)
		this.state = {
			fullPageReload: true
		}
	}

	componentWillReceiveProps(newProps) {
		
		if (newProps.headerLoading) {
			this.state.fullPageReload = true
		}

		if (!newProps.headerLoading && !newProps.contentLoading) {
			this.state.fullPageReload = false
		}
	}

	render() {

		const coverWrapperClassName = 'header-wrapper'
			+ (this.state.fullPageReload ? '' : ' max-opacity opacity-animation')

		const contentClassName = 'content'
			+ (this.props.headerLoading || this.props.contentLoading ? '' : ' max-opacity opacity-animation')

		const containerStyle = {
			minHeight: '100vh'
		}

		return (
			<div style={ containerStyle }>

				<div className="fullpage-spinner-container">
					<div className="content-spinner">
						{ this.props.headerLoading && this.state.fullPageReload && <Spinner /> }
					</div>
				</div>

				<div>

					<div className={ coverWrapperClassName }>
						<Cover />
					</div>

					{ !this.state.fullPageReload && this.props.contentLoading && (
						<div className="content-spinner-container">
							<Spinner />
						</div>
					)}
					<div className={ contentClassName }>
						{ this.props.children }
					</div>

				</div>
				
			</div>
		)
	}
}