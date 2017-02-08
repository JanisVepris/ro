export default (id) => {

	const eventsPlaylists = {
		[222014]: [
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
		],
		[222015]: [
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
	}

	return eventsPlaylists[id]
}