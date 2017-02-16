import eventsMock from './events-mock'

export const getEvents = () => {
	
	const delayedPromise = new Promise((resolve) => setTimeout(() => resolve(eventsMock), 300))

	return Promise.resolve(delayedPromise)
}