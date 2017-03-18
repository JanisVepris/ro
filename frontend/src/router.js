import React from 'react'
import { Router, Route, IndexRoute } from 'react-router'
import { history } from './store'
import App from './containers/app'
import Config from './config'

import News from './containers/news'
import Article from './containers/article'
import Gallery from './containers/gallery'
import Videos from './containers/videos'
import Team from './containers/team'
import Script from './containers/script'
import Facts from './containers/facts'
import Poster from './containers/poster'

export default () => {

	const newsUrl = '/:eventSlug/' + Config.categories.news.slug
	const articlesUrl = '/:eventSlug/' + Config.categories.news.slug + '/:articleSlug'
	const galleryUrl = '/:eventSlug/' + Config.categories.gallery.slug
	const videosUrl = '/:eventSlug/' + Config.categories.videos.slug
	const scriptUrl = '/:eventSlug/' + Config.categories.script.slug
	const teamUrl = '/:eventSlug/' + Config.categories.team.slug
	const factsUrl = '/:eventSlug/' + Config.categories.facts.slug
	const posterUrl = '/:eventSlug/' + Config.categories.poster.slug

	return (
		<Router history={ history }>
			<Route path='/(:eventSlug)' component={ App }>
				<IndexRoute component={ News } />
				<Route path={ newsUrl } component={ News } />
				<Route path={ articlesUrl } component={ Article } />
				<Route path={ galleryUrl } component={ Gallery } />
				<Route path={ videosUrl } component={ Videos } />
				<Route path={ scriptUrl } component={ Script } />
				<Route path={ teamUrl } component={ Team } />
				<Route path={ factsUrl } component={ Facts } />
				<Route path={ posterUrl } component={ Poster } />
			</Route>
		</Router>
	)
}