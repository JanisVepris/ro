export default (id) => {

	const events = {
		[112015]: {
			title: 'Prototipas',
			id:	112015,
			playlistId: null,
			galleryId:	332015,
			videoPlaylistId: 442015,
			eventDate:  '2016-04-23',
			image: 'https://www.dropbox.com/s/l8un19bszqsye5g/cover2.png?raw=1'
		},
		[112014]: {
			title: 'Naktis, kai sustojo malūnas',
			id:	112014,
			playlistId: 222014,
			galleryId:	332014,
			videoPlaylistId: null,
			eventDate:  '2016-04-04',
			image: 'https://www.dropbox.com/s/q8z14hzcr8eifrk/cover_mock.png?raw=1'
		}
	}

	return events[id]
}