import * as React from 'react'

const NewsOverviewItem = ({
	imageUrl,
	createdOn,
	title,
	onClick,
	hasSpacingMargin
}) => {

	const containerClassName = 'news-overview-item clickable' + (hasSpacingMargin ? ' news-spacing-margin' : '')

	return (
		<div className={ containerClassName } onClick={ onClick }>
			<div className="news-overview-item-image-container ">
				<div className="news-overview-item-image" style={{ backgroundImage: `url(${imageUrl})` }} />
			</div>
			<p className="news-overview-item-title ">{ title }</p>
			<label className="news-overview-item-date">{ createdOn }</label>
			<label className="news-overview-item-read-more no-select">Skaityti...</label>
		</div>
	)
}

export default NewsOverviewItem
