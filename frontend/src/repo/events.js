import eventsMock from './events-mock'

export const getEvents = () => {
	return Promise.resolve(eventsMock)
}