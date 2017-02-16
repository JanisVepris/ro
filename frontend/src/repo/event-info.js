import eventInfoMock from './event-info-mock'

export const getEventInfo = (id) => {

	const delayedPromise = new Promise((resolve) => setTimeout(() => resolve(eventInfoMock(id)), 1000))

	return Promise.resolve(delayedPromise)
}