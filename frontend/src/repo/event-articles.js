/* global WEB_API_URL USE_MOCK require */
import superagent from 'superagent'

export const getEventArticles = (eventId) => {
	
	if (USE_MOCK) {

		const mock = require('./event-articles-mock')
		const delayedPromise = new Promise((resolve) => setTimeout(() => resolve(mock(eventId)), 300))
		return Promise.resolve(delayedPromise)
	}

	return superagent
		.get(WEB_API_URL + `/events/${eventId}/articles`)
		.then(res => res.body)
}