import eventInfoMock from './event-info-mock'

export const getEventInfo = (id) => {
	return Promise.resolve(eventInfoMock[id])
}