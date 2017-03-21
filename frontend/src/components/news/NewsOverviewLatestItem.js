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
				<div className="latest-article-image clickable" onClick={ onClick } style={{ backgroundImage: `url(${imageUrl})` }} />
			</div>
			<div className="latest-article-info">
				<p className="latest-article-title clickable" onClick={ onClick }>{ title }</p>
				<label className="latest-article-date">{ createdOn }</label>
				<p className="latest-article-description">{ description }</p>
				<label className="latest-article-read-more clickable float-right no-select" onClick={ onClick } >Skaityti...</label>
			</div>
		</div>
	)
}

export default NewsOverviewLatestItem
