/* global module */
module.exports = (id) => {
	const eventsVideos = {
		[112014]: {
			items: [
				{
					title: 'Scena 1 - Naugardukas naugardukino miške',
					url: 'https://www.youtube.com/watch?v=gHxvP7Sxyrw&list=PLJR0eGF2o73364h5dWgXAZCRpxFLsG8UN&index=1'
				},
				{
					title: 'Scena 2 - Miško medžiai ir krūmai',
					url: 'https://www.youtube.com/watch?v=gHxvP7Sxyrw&list=PLJR0eGF2o73364h5dWgXAZCRpxFLsG8UN&index=1'
				},
				{
					title: 'Scena 3 - Pasaulis be debėsų ir upių',
					url: 'https://www.youtube.com/watch?v=gHxvP7Sxyrw&list=PLJR0eGF2o73364h5dWgXAZCRpxFLsG8UN&index=1'
				}
			]
		},
		[112015]: {
			items: [
				{
					title: 'Scena 1 - Langas per kurį nesimato',
					url: 'https://www.youtube.com/watch?v=gHxvP7Sxyrw&list=PLJR0eGF2o73364h5dWgXAZCRpxFLsG8UN&index=1'
				},
				{
					title: 'Scena 2 - Tai kas yra faina',
					url: 'https://www.youtube.com/watch?v=gHxvP7Sxyrw&list=PLJR0eGF2o73364h5dWgXAZCRpxFLsG8UN&index=1'
				},
				{
					title: 'Scena 3 - Pabaigos pradžios įpusėjimas',
					url: 'https://www.youtube.com/watch?v=gHxvP7Sxyrw&list=PLJR0eGF2o73364h5dWgXAZCRpxFLsG8UN&index=1'
				}
			]
		}
	}

	return eventsVideos[id]
}