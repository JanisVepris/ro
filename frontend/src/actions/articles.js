import { push } from 'react-router-redux'
import Config from '../config'

import * as articleRepo from '../repo/event-article'

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

	const { activeEventId, activeCategory, eventsById } = getState().app

	const categorySlug = Config.categories[activeCategory].slug
	const eventSlug = eventsById[activeEventId].slug

	dispatch(push('/' + eventSlug + '/' + categorySlug + '/' + articleSlug))
	dispatch(setArticleLoading(true))
	dispatch(setHeaderLoading(true))

	return dispatch(loadEventNews(activeEventId))
		.then(() => {
			
			const eventNews = getState().events.newsById[activeEventId]
			
			const article = eventNews && eventNews.articles.find(article => article.slug === articleSlug)

			const articleId = article && article.id

			if (getState().events.articleById[articleId]) {
				return Promise.resolve(article)
			}

			return articleId
				? dispatch(loadArticle(articleId))
				: Promise.reject()
		})
		.then(article => {
			
			if (article.image) {
				dispatch(setHeaderCover(article.image))
			}	
			
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
	dispatch
) => {

	return articleRepo.getArticle(articleId)
		.then(response => {
			dispatch(setArticle(articleId, response))
			return Promise.resolve(response)
		})
		.catch(err => {
			console.log(err)
		})
}