import teamMock from './event-team-mock'

export const getTeam = (id) => {

	const delayedPromise = new Promise((resolve) => setTimeout(() => resolve(teamMock(id)), 0))

	return Promise.resolve(delayedPromise)
}