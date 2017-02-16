export const toReducer = (
	defaultState,
	reducerFactory
) => (
	state = defaultState,
	action
) => {

	const reducer = reducerFactory(state)[action.type]
	if (!reducer) {
		return state
	}

	return reducer(action)
}