/*import { Dispatch } from 'redux'


// types
export const LOCATION_ITEMS_ADD = 'LOCATION_ITEMS_ADD'

/
// simple actions
export const addItems = (ruleUid: string, ids: number[]): ILocationItemAction => ({
	type: LOCATION_ITEMS_ADD,
	ruleUid,
	ids
})

export const removeItems = (ruleUid: string, ids: number[]): ILocationItemAction => ({
	type: LOCATION_ITEMS_REMOVE,
	ruleUid,
	ids
})

export const setLocationsNames = (
	ids: number[],
	names: string[]
): ISetLocationNames => ({
	type: LOCATION_SET_NAMES,
	ids,
	names
})

// Thunks
export const resolveLocationNames = (ids: number[]) => (
	dispatch: Dispatch,
	getState: () => TState
) => {

	const { locationNameById } = getState().targeting

	const unresolvedLocationIds = ids.filter(id => !locationNameById[id])
	if (!unresolvedLocationIds.length) {
		return Promise.resolve()
	}

	return LocationsRepo.getLocationsNames(unresolvedLocationIds)
		.then(names => dispatch(setLocationsNames(ids, names)))
}

export const addLocationItem = (ruleUid: string, id: number) => (
	dispatch: Dispatch
) => dispatch(resolveLocationNames([id]))
		.then(dispatch(addItems(ruleUid, [id])))*/