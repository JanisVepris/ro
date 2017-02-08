export default (id) => {

	const eventsTeams = {
		[112014]: '<p>KOMANDAA  2014</p>',
		[112015]: '<p>KOMANDAA  2015</p>'
	}

	return eventsTeams[id]
}