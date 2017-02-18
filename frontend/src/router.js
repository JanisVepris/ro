import React from 'react'
import { Router, Route, IndexRoute } from 'react-router'
import { history } from './store'
import App from './containers/app'
import Config from './config'

import News from './containers/news'
import Gallery from './containers/gallery'
import Videos from './containers/videos'

export default () => {

	const newsUrl = '/:eventSlug/' + Config.categories.news.slug
	const galleryUrl = '/:eventSlug/' + Config.categories.gallery.slug
	const videosUrl = '/:eventSlug/' + Config.categories.videos.slug

	return (
		<Router history={ history }>
			<Route path='/(:eventSlug)' component={ App }>
				<IndexRoute component={ News } />
				<Route path={ newsUrl } component={ News } />
				<Route path={ galleryUrl } component={ Gallery } />
				<Route path={ videosUrl } component={ Videos } />
			</Route>
		</Router>
	)
}