import eventArticlesMock from './event-articles-mock'

export const getEventArticles = (id) => {

	const delayedPromise = new Promise((resolve) => setTimeout(() => resolve(eventArticlesMock(id)), 500))

	return Promise.resolve(delayedPromise)
}