/* global WEB_API_URL USE_MOCK require */
import superagent from 'superagent'

export const getEvents = () => {
	
	if (USE_MOCK) {

		const delayedPromise = new Promise((resolve) => setTimeout(() => resolve(require('./events-mock')), 300))
		return Promise.resolve(delayedPromise)
	}

	return superagent
		.get(WEB_API_URL + '/events')
		.then(res => res.body)
}