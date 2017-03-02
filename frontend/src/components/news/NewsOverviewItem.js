import * as React from 'react'

const NewsOverviewItem = ({
	imageUrl,
	createdOn,
	title,
	onClick,
	hasSpacingMargin
}) => {

	const containerClassName = 'news-overview-item' + (hasSpacingMargin ? ' news-spacing-margin' : '')

	return (
		<div className={ containerClassName }>
			<div className="news-overview-item-image-container">
				<div className="news-overview-item-image" style={{ backgroundImage: `url(${imageUrl})` }} />
			</div>
			<p>{ title }</p>
			<label>{ createdOn }</label>
		</div>
	)
}

export default NewsOverviewItem
