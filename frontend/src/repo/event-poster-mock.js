export default (id) => {

	const events = {
		[112014]: {
			url: 'http://rokooperos.midi.lt/wp-content/uploads/plakatas7.jpg'
		},
		[112015]: {
			url: 'http://rokooperos.midi.lt/wp-content/uploads/plakatas7.jpg'
		}
	}

	return events[id]
}