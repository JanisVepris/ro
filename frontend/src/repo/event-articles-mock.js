module.exports = (id, limit = 5, offset = 0) => {

	const eventArticles = {
		[112014]: {
			total: 4,
			limit: 5,
			offset: 0,
			articles: [
				{
					id: 201402,
					slug: 'artiklas201402',
					title: 'Nuo MIDI Roko Operos iki profesionaliosios scenos: Artūras Žabas',
					thumbBig: 'https://www.dropbox.com/s/uiekg1iv5iemeh6/fotke.jpg?raw=1',
					thumbSmall: 'https://www.dropbox.com/s/uiekg1iv5iemeh6/fotke.jpg?raw=1',
					description: 'Šiais metais MIDI Roko Operos komanda kaip niekad stengiasi palaikyti ryšį su senbuviais – tais, kurie būtų įdomūs ne tik mums patiems, bet ir skaitytojams, nes jie yra žinomi muzikos pasaulyje. Šį kartą kalbiname Artūrą Žabą, kuris dar studijuodamas Lietuvos muzikos ir teatro akademijoje dalyvavo MIDI Roko Operoje. Pasidomėjome, kaip jam sekėsi derinti šiuos du dalykus.',
					createdOn: '2016.03.12'
				},
				{
					id: 201403,
					slug: 'artiklas201403',
					title: 'Nuo MIDI Roko Operos iki profesionaliosios scenos: Artūras Žabas' ,
					thumbBig: 'https://www.dropbox.com/s/uiekg1iv5iemeh6/fotke.jpg?raw=1',
					thumbSmall: 'https://www.dropbox.com/s/uiekg1iv5iemeh6/fotke.jpg?raw=1',
					description: 'Šiais metais MIDI Roko Operos komanda kaip niekad stengiasi palaikyti ryšį su senbuviais – tais, kurie būtų įdomūs ne tik mums patiems, bet ir skaitytojams, nes jie yra žinomi muzikos pasaulyje.',
					createdOn: '2016.03.12'
				},
				{
					id: 201404,
					slug: 'artiklas201404',
					title: 'Nuo MIDI Roko Operos iki profesionaliosios scenos: Artūras Žabas' ,
					thumbBig: 'https://www.dropbox.com/s/uiekg1iv5iemeh6/fotke.jpg?raw=1',
					thumbSmall: 'https://www.dropbox.com/s/uiekg1iv5iemeh6/fotke.jpg?raw=1',
					description: 'Šiais metais MIDI Roko Operos komanda kaip niekad stengiasi palaikyti ryšį su senbuviais – tais, kurie būtų įdomūs ne tik mums patiems, bet ir skaitytojams, nes jie yra žinomi muzikos pasaulyje.',
					createdOn: '2016.03.12'
				},
				{
					id: 201405,
					slug: 'artiklas201405',
					title: 'Nuo MIDI Roko Operos iki profesionaliosios scenos: Artūras Žabas' ,
					thumbBig: 'https://www.dropbox.com/s/uiekg1iv5iemeh6/fotke.jpg?raw=1',
					thumbSmall: 'https://www.dropbox.com/s/uiekg1iv5iemeh6/fotke.jpg?raw=1',
					description: 'Šiais metais MIDI Roko Operos komanda kaip niekad stengiasi palaikyti ryšį su senbuviais – tais, kurie būtų įdomūs ne tik mums patiems, bet ir skaitytojams, nes jie yra žinomi muzikos pasaulyje.',
					createdOn: '2016.03.12'
				}
			]
		},
		[112015]: {
			total: 11,
			limit: 5,
			offset: 0,
			articles: [
				{
					id: 201501,
					slug: 'artiklas201501',
					title: 'Nuo MIDI Roko Operos iki profesionaliosios scenos: Artūras Žabas' ,
					thumbBig: 'https://www.dropbox.com/s/uiekg1iv5iemeh6/fotke.jpg?raw=1',
					thumbSmall: 'https://www.dropbox.com/s/uiekg1iv5iemeh6/fotke.jpg?raw=1',
					description: 'Šiais metais MIDI Roko Operos komanda kaip niekad stengiasi palaikyti ryšį su senbuviais – tais, kurie būtų įdomūs ne tik mums patiems, bet ir skaitytojams, nes jie yra žinomi muzikos pasaulyje. Šį kartą kalbiname Artūrą Žabą, kuris dar studijuodamas Lietuvos muzikos ir teatro akademijoje dalyvavo MIDI Roko Operoje. Pasidomėjome, kaip jam sekėsi derinti šiuos du dalykus ir kitus.',
					createdOn: '2016.03.12'
				},
				{
					id: 201502,
					slug: 'artiklas201502',
					title: 'Nuo MIDI Roko Operos iki profesionaliosios scenos: Artūras Žabas' ,
					thumbBig: 'https://www.dropbox.com/s/uiekg1iv5iemeh6/fotke.jpg?raw=1',
					thumbSmall: 'https://www.dropbox.com/s/uiekg1iv5iemeh6/fotke.jpg?raw=1',
					description: 'Šiais metais MIDI Roko Operos komanda kaip niekad stengiasi palaikyti ryšį su senbuviais – tais, kurie būtų įdomūs ne tik mums patiems, bet ir skaitytojams, nes jie yra žinomi muzikos pasaulyje.',
					createdOn: '2016.03.13'
				},
				{
					id: 201503,
					slug: 'artiklas201503',
					title: 'Nuo MIDI Roko Operos iki profesionaliosios scenos: Artūras Žabas' ,
					thumbBig: 'https://www.dropbox.com/s/uiekg1iv5iemeh6/fotke.jpg?raw=1',
					thumbSmall: 'https://www.dropbox.com/s/uiekg1iv5iemeh6/fotke.jpg?raw=1',
					description: 'Šiais metais MIDI Roko Operos komanda kaip niekad stengiasi palaikyti ryšį su senbuviais – tais, kurie būtų įdomūs ne tik mums patiems, bet ir skaitytojams, nes jie yra žinomi muzikos pasaulyje.',
					createdOn: '2016.03.14'
				},
				{
					id: 201504,
					slug: 'artiklas201504',
					title: 'Nuo MIDI Roko Operos iki profesionaliosios scenos: Artūras Žabas' ,
					thumbBig: 'https://www.dropbox.com/s/uiekg1iv5iemeh6/fotke.jpg?raw=1',
					thumbSmall: 'https://www.dropbox.com/s/uiekg1iv5iemeh6/fotke.jpg?raw=1',
					description: 'Šiais metais MIDI Roko Operos komanda kaip niekad stengiasi palaikyti ryšį su senbuviais – tais, kurie būtų įdomūs ne tik mums patiems, bet ir skaitytojams, nes jie yra žinomi muzikos pasaulyje.',
					createdOn: '2016.03.15'
				},
				{
					id: 201505,
					slug: 'artiklas201505',
					title: 'Nuo MIDI Roko Operos iki profesionaliosios scenos: Artūras Žabas' ,
					thumbBig: 'https://www.dropbox.com/s/uiekg1iv5iemeh6/fotke.jpg?raw=1',
					thumbSmall: 'https://www.dropbox.com/s/uiekg1iv5iemeh6/fotke.jpg?raw=1',
					description: 'Šiais metais MIDI Roko Operos komanda kaip niekad stengiasi palaikyti ryšį su senbuviais – tais, kurie būtų įdomūs ne tik mums patiems, bet ir skaitytojams, nes jie yra žinomi muzikos pasaulyje.',
					createdOn: '2016.03.16'
				},
				{
					id: 201506,
					slug: 'artiklas201506',
					title: 'Nuo MIDI Roko Operos iki profesionaliosios scenos: Artūras Žabas' ,
					thumbBig: 'https://www.dropbox.com/s/uiekg1iv5iemeh6/fotke.jpg?raw=1',
					thumbSmall: 'https://www.dropbox.com/s/uiekg1iv5iemeh6/fotke.jpg?raw=1',
					description: 'Šiais metais MIDI Roko Operos komanda kaip niekad stengiasi palaikyti ryšį su senbuviais – tais, kurie būtų įdomūs ne tik mums patiems, bet ir skaitytojams, nes jie yra žinomi muzikos pasaulyje.',
					createdOn: '2016.03.17'
				},
				{
					id: 201507,
					slug: 'artiklas201507',
					title: 'Nuo MIDI Roko Operos iki profesionaliosios scenos: Artūras Žabas' ,
					thumbBig: 'https://www.dropbox.com/s/uiekg1iv5iemeh6/fotke.jpg?raw=1',
					thumbSmall: 'https://www.dropbox.com/s/uiekg1iv5iemeh6/fotke.jpg?raw=1',
					description: 'Šiais metais MIDI Roko Operos komanda kaip niekad stengiasi palaikyti ryšį su senbuviais – tais, kurie būtų įdomūs ne tik mums patiems, bet ir skaitytojams, nes jie yra žinomi muzikos pasaulyje.',
					createdOn: '2016.03.18'
				},
				{
					id: 201508,
					slug: 'artiklas201508',
					title: 'Nuo MIDI Roko Operos iki profesionaliosios scenos: Artūras Žabas' ,
					thumbBig: 'https://www.dropbox.com/s/uiekg1iv5iemeh6/fotke.jpg?raw=1',
					thumbSmall: 'https://www.dropbox.com/s/uiekg1iv5iemeh6/fotke.jpg?raw=1',
					description: 'Šiais metais MIDI Roko Operos komanda kaip niekad stengiasi palaikyti ryšį su senbuviais – tais, kurie būtų įdomūs ne tik mums patiems, bet ir skaitytojams, nes jie yra žinomi muzikos pasaulyje.',
					createdOn: '2016.03.19'
				},
				{
					id: 201509,
					slug: 'artiklas201509',
					title: 'Nuo MIDI Roko Operos iki profesionaliosios scenos: Artūras Žabas' ,
					thumbBig: 'https://www.dropbox.com/s/uiekg1iv5iemeh6/fotke.jpg?raw=1',
					thumbSmall: 'https://www.dropbox.com/s/uiekg1iv5iemeh6/fotke.jpg?raw=1',
					description: 'Šiais metais MIDI Roko Operos komanda kaip niekad stengiasi palaikyti ryšį su senbuviais – tais, kurie būtų įdomūs ne tik mums patiems, bet ir skaitytojams, nes jie yra žinomi muzikos pasaulyje.',
					createdOn: '2016.03.20'
				},
				{
					id: 201510,
					slug: 'artiklas201510',
					title: 'Nuo MIDI Roko Operos iki profesionaliosios scenos: Artūras Žabas' ,
					thumbBig: 'https://www.dropbox.com/s/uiekg1iv5iemeh6/fotke.jpg?raw=1',
					thumbSmall: 'https://www.dropbox.com/s/uiekg1iv5iemeh6/fotke.jpg?raw=1',
					description: 'Šiais metais MIDI Roko Operos komanda kaip niekad stengiasi palaikyti ryšį su senbuviais – tais, kurie būtų įdomūs ne tik mums patiems, bet ir skaitytojams, nes jie yra žinomi muzikos pasaulyje.',
					createdOn: '2016.03.21'
				},
				{
					id: 201511,
					slug: 'artiklas201511',
					title: 'Nuo MIDI Roko Operos iki profesionaliosios scenos: Artūras Žabas' ,
					thumbBig: 'https://www.dropbox.com/s/uiekg1iv5iemeh6/fotke.jpg?raw=1',
					thumbSmall: 'https://www.dropbox.com/s/uiekg1iv5iemeh6/fotke.jpg?raw=1',
					description: 'Šiais metais MIDI Roko Operos komanda kaip niekad stengiasi palaikyti ryšį su senbuviais – tais, kurie būtų įdomūs ne tik mums patiems, bet ir skaitytojams, nes jie yra žinomi muzikos pasaulyje.',
					createdOn: '2016.03.22'
				}
			]
		}
	}

	return {
		...eventArticles[id],
		limit,
		offset,
		articles: eventArticles[id].articles.slice(offset, offset + limit)
	}
}
