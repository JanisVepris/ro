import scriptMock from './event-script-mock'

export const getScript = (id) => {

	const delayedPromise = new Promise((resolve) => setTimeout(() => resolve(scriptMock(id)), 0))

	return Promise.resolve(delayedPromise)
}