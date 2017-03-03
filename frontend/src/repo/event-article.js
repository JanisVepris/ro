import articlesMock from './event-article-mock'

export const getArticle = (id) => {

	const delayedPromise = new Promise((resolve) => setTimeout(() => resolve(articlesMock(id)), 1000))

	return Promise.resolve(delayedPromise)
}