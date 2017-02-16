import eventsMock from './events-mock'

export const getEvents = () => {
	
	const delayedPromise = new Promise((resolve) => setTimeout(() => resolve(eventsMock), 1000))

	return Promise.resolve(delayedPromise)
}