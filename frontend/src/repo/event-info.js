import eventInfoMock from './event-info-mock'

export const getEventInfo = (id) => {

	const delayedPromise = new Promise((resolve) => setTimeout(() => resolve(eventInfoMock(id)), 0))

	return Promise.resolve(delayedPromise)
}