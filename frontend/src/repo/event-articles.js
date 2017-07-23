/* global WEB_API_URL USE_MOCK */
import superagent from 'superagent'
import * as queryString from 'queryString'

export const getEventArticles = (eventId, limit, offset) => {

	if (USE_MOCK) {

		const mock = require('./event-articles-mock')
		const delayedPromise = new Promise((resolve) => setTimeout(() => resolve(mock(eventId, limit, offset)), 300))
		return Promise.resolve(delayedPromise)
	}

	const query = limit || offset
		? '?' + queryString.stringify({ limit, offset })
		: ''

	return superagent
		.get(WEB_API_URL + `/events/${eventId}/articles${query}`)
		.then(res => res.body)
}
