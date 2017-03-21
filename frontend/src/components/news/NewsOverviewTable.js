import * as React from 'react'

import NewsOverviewLatestItem from './NewsOverviewLatestItem'
import NewsOverviewItem from './NewsOverviewItem'

export default class NewsOverviewTable extends React.Component {

	constructor() {

		super()
		this.state = {
			marginSpacingMod: window.innerWidth > 950 ? 3 : 2
		}

		window.addEventListener('resize', () => {

			const marginSpacingMod = window.innerWidth > 950 ? 3 : 2

			if (this.state.marginSpacingMod !== marginSpacingMod) {
				this.setState({ marginSpacingMod })
			}
		})
	}  

	render() {

		const { firstArticle, articles } = this.props

		return (
			<div>
				<div>
					{
						firstArticle &&
							<NewsOverviewLatestItem 
								imageUrl={ firstArticle.thumbBig }
								description={ firstArticle.description }
								title={ firstArticle.title }
								onClick={ firstArticle.onClick }
								createdOn={ firstArticle.createdOn }
								/>
					}
				</div>
				<div className="news-overview-container">
					{	
						articles.map((newsItem, index) => (
							<NewsOverviewItem
								key={ index }
								imageUrl={ newsItem.thumbSmall }
								title={ newsItem.title }
								onClick={ newsItem.onClick }
								createdOn={ newsItem.createdOn }
								hasSpacingMargin={ 
									(index + 1) % this.state.marginSpacingMod !== 0
								}
								/>
						)
					)}
				</div>
			</div>
		)
	}
}
