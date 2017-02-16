export default (id) => {

	const events = {
		[112015]: {
			title: 'Prototipas',
			id:	112015,
			playlistId: null,
			galleryId:	332015,
			videoPlaylistId: 442015,
			eventDate:  '2016-04-23',
			image: 'http://rokooperos.midi.lt/wp-content/uploads/Teatromatika_13_010.jpg'
		},
		[112014]: {
			title: 'Naktis, kai sustojo malūnas',
			id:	112014,
			playlistId: 222014,
			galleryId:	332014,
			videoPlaylistId: null,
			eventDate:  '2016-04-04',
			image: 'http://rokooperos.midi.lt/wp-content/uploads/Viduramziai_rytoj_05_005.jpg'
		}
	}

	return events[id]
}