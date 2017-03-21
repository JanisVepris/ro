export default (id) => {

	const events = {
		[112015]: {
			title: 'Prototipas',
			id:	112015,
			videoPlaylistId: 442015,
			eventDate: '2015-04-23',
			image: 'https://www.dropbox.com/s/l8un19bszqsye5g/cover2.png?raw=1',
			hasLyrics: true,
			hasFacts: true,
			hasGallery: true,
			hasPoster: true,
			hasTeam: true,
			hasScript: true,
			hasAudioPlaylist: true
		},
		[112014]: {
			title: 'Naktis, kai sustojo malūnas',
			id:	112014,
			videoPlaylistId: null,
			eventDate:  '2014-04-04',
			image: 'https://www.dropbox.com/s/q8z14hzcr8eifrk/cover_mock.png?raw=1',
			hasLyrics: true,
			hasFacts: false,
			hasGallery:	true,
			hasPoster: true,
			hasTeam: false,
			hasScript: true,
			hasAudioPlaylist: true
		}
	}

	return events[id]
}