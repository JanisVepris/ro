export default (id) => {

	const eventsScript = {
		[112014]: {
			content: '<p>SCRIPT  2014</p>'
		},
		[112015]: {
			content: '<p>SCRIPT  2015</p>'
		}
	}

	return eventsScript[id]
}