import * as React from 'react'

const NewsOverviewLatestItem = ({
	imageUrl,
	title,
	createdOn,
	description,
	onClick
}) => {

	return (
		<div className="latest-article">
			<div className="latest-article-image-container">
				<div className="latest-article-image" style={{ backgroundImage: `url(${imageUrl})` }} />
			</div>
			<div className="latest-article-info">
				<p className="latest-article-title">{ title }</p>
				<label className="latest-article-date">{ createdOn }</label>
				<p className="latest-article-description">{ description }</p>
			</div>
		</div>
	)
}

export default NewsOverviewLatestItem
