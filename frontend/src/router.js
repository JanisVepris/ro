import React from 'react'
import { Router, Route, IndexRoute } from 'react-router'
import { history } from './store'
import App from './containers/app'
import Config from './config'

import News from './containers/news'
import Gallery from './containers/gallery'

export default () => {

	const newsUrl = '/:eventSlug/' + Config.categories.news.slug
	const galleryUrl = '/:eventSlug/' + Config.categories.gallery.slug

	return (
		<Router history={ history }>
			<Route path='/(:eventSlug)' component={ App }>
				<IndexRoute component={ News } />
				<Route path={ newsUrl } component={ News } />
				<Route path={ galleryUrl } component={ Gallery } />
			</Route>
		</Router>
	)
}