export default (id) => {

	const eventsFacts = {
		[112014]: '<p>FACTS 2014</p>',
		[112015]: '<p>FACTS 2015</p>'
	}

	return eventsFacts[id]
}