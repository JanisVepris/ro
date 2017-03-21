/* global WEB_API_URL USE_MOCK require */
import superagent from 'superagent'

export const getArticle = (eventId, id) => {
	
	if (USE_MOCK) {

		const mock = require('./event-article-mock')
		const delayedPromise = new Promise((resolve) => setTimeout(() => resolve(mock(id)), 300))
		return Promise.resolve(delayedPromise)
	}

	return superagent
		.get(WEB_API_URL + `/events/${eventId}/articles/${id}`)
		.then(res => res.body)
}