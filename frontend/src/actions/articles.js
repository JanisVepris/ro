import { push } from 'react-router-redux'
import { browserHistory } from 'react-router'
import Config from '../config'

import { setActiveCategory } from './app'
import { loadEventNews, setNews } from './events'
import { setHeaderLoading, setHeaderCover } from './header'

import * as articleRepo from '../repo/event-article'

// Action types
export const ARTICLES_SET_PAGE = 'ARTICLES_SET_PAGE'
export const ARTICLE_SET_ACTIVE = 'ARTICLE_SET_ACTIVE'
export const ARTICLE_SET_LOADING = 'ARTICLE_SET_LOADING'
export const ARTICLE_SET = 'ARTICLE_SET'

// Action creators
export const setArticlesPage = (page) => ({ type: ARTICLES_SET_PAGE, page })
export const setActiveArticle = (id) => ({ type: ARTICLE_SET_ACTIVE, id })
export const setArticle = (id, article) => ({ type: ARTICLE_SET, id, article })
const setArticleLoading = (loading) => ({ type: ARTICLE_SET_LOADING, loading })

// Thunks
export const navigateToArticle = (articleSlug) => (
	dispatch,
	getState
) => {

	dispatch(setActiveCategory('articles'))
	dispatch(setHeaderLoading(true))
	dispatch(setArticleLoading(true))

	const { activeEventId, activeCategory, eventsById } = getState().app
	const categorySlug = Config.categories['articles'].slug
	const eventSlug = eventsById[activeEventId].slug

	window.scrollTo(0, 0)

	const newRoute = '/' + eventSlug + '/' + categorySlug + '/' + articleSlug

	if (browserHistory.getCurrentLocation().pathname !== newRoute) {
		dispatch(push(newRoute))
	}
	
	return dispatch(loadEventNews(activeEventId))
		.then(() => dispatch(loadAndSetArticle(articleSlug)))
		.then(() => dispatch(setArticleLoading(false)))
		.catch(err => {
			console.log('404: Article failed to load, error: ', err)
			dispatch(setArticleLoading(false))
		})
}

const loadAndSetArticle = (articleSlug) => (
	dispatch,
	getState
) => {

	const { events, app } = getState()
	const eventNews = events.newsById[app.activeEventId]
	const article = eventNews && eventNews.articles.find(article => article.slug === articleSlug)
	const articleId = article && article.id

	if (!article || !articleId) {
		return Promise.reject()
	}

	if (article && article.image) {
		dispatch(setHeaderLoading(true))
	}

	if (events.articleById[articleId]) {

		dispatch(setHeaderCover(events.articleById[articleId].image))
		return Promise.resolve(article)	
	}

	return dispatch((loadArticle(articleId)))
		.then(article => {

			if (article.image) {
				dispatch(setHeaderCover(article.image))
			}
			
			dispatch(setActiveArticle(article.id))

			return Promise.resolve()
		})
}

const loadArticle = (articleId) => (
	dispatch,
	getState
) => articleRepo.getArticle(getState().app.activeEventId, articleId)
	.then(response => {
		dispatch(setArticle(articleId, response))
		return Promise.resolve(response)
	})
	.catch(err => {
		console.log(err)
	})

export const changePage = (page) => (
	dispatch,
	getState
) => {

	const state = getState()
	const { activeEventId, eventsById } = state.app
	const { articlesPage } = state.events

	const cover = document.getElementsByClassName('cover-wrapper')[0]
	window.scrollTo(0, cover.offsetHeight)

	const eventSlug = eventsById[activeEventId].slug
	const newPath = '/' + eventSlug + '/' + Config.categories['news'].slug + (
		page && page > 1
			? `/${page}`
			: ''
	)

	if (browserHistory.getCurrentLocation().pathname !== newPath) {
		browserHistory.push(newPath)
		dispatch(push(newPath))
	}

	dispatch(setArticlesPage(page))
	dispatch(setNews(activeEventId, null))
	return dispatch(loadEventNews(activeEventId))
}
