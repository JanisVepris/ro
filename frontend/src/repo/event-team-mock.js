export default (id) => {

	const eventsTeams = {
		[112014]: {
			content: '<p>KOMANDAA  2014</p>'
		},
		[112015]: {
			content: '<p>KOMANDAA  2015</p>'
		},
	}

	return eventsTeams[id]
}