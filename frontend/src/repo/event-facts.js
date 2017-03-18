import factsMock from './event-facts-mock'

export const getFacts = (id) => {

	const delayedPromise = new Promise((resolve) => setTimeout(() => resolve(factsMock(id)), 0))

	return Promise.resolve(delayedPromise)
}