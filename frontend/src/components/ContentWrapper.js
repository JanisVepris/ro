import React from 'react'
import Spinner from './Spinner'

import Cover from '../containers/header/Cover'

export default class App extends React.Component {

	constructor(props) {
		super(props)
		this.state = {
			fullPageReload: true,
			reanimate: false
		}
	}

	componentWillReceiveProps(newProps) {
		
		if (newProps.headerLoading) {
			this.state.fullPageReload = true
		}

		if (!newProps.headerLoading && !newProps.contentLoading) {
			this.state.fullPageReload = false
		}

		if (this.props.headerLoading === newProps.headerLoading && 
			this.props.contentLoading === newProps.contentLoading) {
			this.state.reanimate = true
		}
	}

	render() {

		const coverWrapperClassName = 'cover-wrapper'
			+ ( this.state.fullPageReload 
				? ' no-click'
				: ' max-opacity opacity-animation'
			)

		const contentClassName = `content ${this.props.activeCategory}`
			+ ( this.props.headerLoading || this.props.contentLoading || this.state.reanimate
				? ' no-click'
				: ' max-opacity opacity-animation'
			)

		const containerStyle = {
			minHeight: '100vh'
		}

		if (this.state.reanimate) {
			setTimeout(() => {
				this.setState({
					fullPageReload: this.state.fullPageReload,
					reanimate: false
				})
			}, 0)
		}

		return (
			<div style={ containerStyle }>

				{ this.props.headerLoading && this.state.fullPageReload && (
					<div className="fullpage-spinner-container">
						<div className="content-spinner">
							<Spinner /> 
						</div>
					</div>
				)}
				
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