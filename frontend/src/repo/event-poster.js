import posterMock from './event-poster-mock'

export const getPoster = (id) => {

	const delayedPromise = new Promise((resolve) => setTimeout(() => resolve(posterMock(id)), 0))

	return Promise.resolve(delayedPromise)
}