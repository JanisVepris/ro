/* global module */
module.exports = (id) => {

	const eventsFacts = {
		[112014]: {
			content: '<p>FACTS 2014</p>'
		},
		[112015]: {
			content: '<p>FACTS 2015</p>'
		},
	}

	return eventsFacts[id]
}