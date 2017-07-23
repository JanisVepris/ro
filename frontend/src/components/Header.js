import * as React from 'react'

import EventsButton from '../containers/header/events-button'
import EventsPopup from '../containers/header/events-popup'
import NavigationButton from '../containers/header/navigation-button'
import NavigationPopup from '../containers/header/navigation-popup'
import Title from '../containers/header/title'

const Header = () => (
	<div className="header">
		<i className="facebook-icon ml-xl" onClick={() => { window.open('https://www.facebook.com/rokooperos') }} />
		<i className="instagram-icon ml" onClick={() => { window.open('https://www.instagram.com/midi.lt/') }} />
		<div className="header-events ml" style={{ maxWidth: '80%' }}>
			<EventsButton />
			<EventsPopup />
		</div>
		<div className="header-categories float-right">
			<NavigationButton />
			<NavigationPopup />
		</div>
		<Title />
	</div>
)

export default Header
