import * as React from 'react'

import NewsOverviewLatestItem from './NewsOverviewLatestItem'
import NewsOverviewItem from './NewsOverviewItem'

const NewsOverviewTable = ({
	news
}) => {
	console.log(news)
	return (
		<div>
			<div>
				{
					news.length > 0 &&
						<NewsOverviewLatestItem 
							imageUrl={ news[0].image }
							description={ news[0].description }
							title={ news[0].title }
							onClick={ () => {} }
							createdOn={ news[0].createdOn }
							/>
				}
			</div>
			<div>
				{	
					news.map((newsItem, index) => {

						if (index === 0) {
							return
						}

						return <NewsOverviewItem
									key={ index }
									imageUrl={ newsItem.image }
									title={ newsItem.title }
									onClick={ () => {} }
									createdDate={ newsItem.createdDate }
									/>
					}
				)}
			</div>
		</div>
	)
}

export default NewsOverviewTable
