import { push } from 'react-router-redux'
import Config from '../config'

import * as articleRepo from '../repo/event-article'

import { setActiveCategory } from './app'
import { loadEventNews } from './events'
import { setHeaderLoading, setHeaderCover } from './header'

// Action types
export const ARTICLE_SET_ACTIVE = 'ARTICLE_SET_ACTIVE'
export const ARTICLE_SET_LOADING = 'ARTICLE_SET_LOADING'
export const ARTICLE_SET = 'ARTICLE_SET'

// Action creators
export const setActiveArticle = (id) => ({
	type: ARTICLE_SET_ACTIVE,
	id
})

export const setArticleLoading = (loading) => ({
	type: ARTICLE_SET_LOADING,
	loading
})

export const setArticle = (id, article) => ({
	type: ARTICLE_SET,
	id,
	article
})

export const navigateToArticle = (articleSlug) => (
	dispatch,
	getState
) => {

	dispatch(setActiveCategory('article'))
	dispatch(setArticleLoading(true))

	const state = getState()
	const { activeEventId, activeCategory, eventsById } = state.app

	const categorySlug = Config.categories[activeCategory].slug
	const eventSlug = eventsById[activeEventId].slug

	dispatch(push('/' + eventSlug + '/' + categorySlug + '/' + articleSlug))

	dispatch(setHeaderLoading(true))
	
	window.scrollTo(0, 0)

	return dispatch(loadEventNews(activeEventId))
		.then(() => {
			
			const eventNews = getState().events.newsById[activeEventId]
			
			const article = eventNews && eventNews.articles.find(article => article.slug === articleSlug)

			// if (article.image) {
			// 	dispatch(setHeaderLoading(true))
			// }

			const articleId = article && article.id

			if (getState().events.articleById[articleId]) {
				return Promise.resolve(article)
			}

			return articleId
				? dispatch(loadArticle(articleId))
				: Promise.reject()
		})
		.then(article => {
			
			// setint maza jei telefuons
			dispatch(setHeaderCover(article.image))
			
			dispatch(setActiveArticle(article.id))
			dispatch(setArticleLoading(false))

			return Promise.resolve()
		})
		.catch(err => {
			console.log('Article failed to load, error: ', err)
			dispatch(setArticleLoading(false))
		})
}

const loadArticle = (articleId) => (
	dispatch,
	getState
) => {

	return articleRepo.getArticle(getState().app.activeEventId, articleId)
		.then(response => {
			dispatch(setArticle(articleId, response))
			return Promise.resolve(response)
		})
		.catch(err => {
			console.log(err)
		})
}