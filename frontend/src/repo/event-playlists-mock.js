export default (id) => {

	const eventsPlaylists = {
		[112014]: {
			items: [
				{
					title: 'Scena 1 - dainos pavadinimas',
					url: 'http://rokooperos.midi.lt/wp-content/grand-media/audio/I_scena.mp3'
				},
				{
					title: 'Scena 2 - dainos pavadinimas',
					url: 'http://rokooperos.midi.lt/wp-content/grand-media/audio/I_scena.mp3'
				},
				{
					title: 'Scena 3 - dainos pavadinimas',
					url: 'http://rokooperos.midi.lt/wp-content/grand-media/audio/I_scena.mp3'
				}
			]
		},
		[112015]: {
			items: [
				{
					title: 'Scena 1 - dainos pavadinimas',
					url: 'http://rokooperos.midi.lt/wp-content/grand-media/audio/I_scena.mp3'
				},
				{
					title: 'Scena 2 - dainos pavadinimas',
					url: 'http://rokooperos.midi.lt/wp-content/grand-media/audio/I_scena.mp3'
				},
				{
					title: 'Scena 3 - dainos pavadinimas',
					url: 'http://rokooperos.midi.lt/wp-content/grand-media/audio/I_scena.mp3'
				}
			]
		},
	}

	return eventsPlaylists[id]
}