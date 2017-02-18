import * as React from 'react'
import '../styles/header.scss'
import '../styles/helpers.scss'

import EventsButton from '../containers/header/events-button'
import EventsPopup from '../containers/header/events-popup'
import NavigationButton from '../containers/header/navigation-button'
import NavigationPopup from '../containers/header/navigation-popup'

const Header = () => (
	<div className="header">
		<i className="facebook-icon ml-xl" onClick={() => { window.open('https://www.facebook.com/rokooperos') }} />
		<i className="instagram-icon ml" onClick={() => { window.open('https://www.instagram.com/midirokooperos/') }} />
		<div className="header-events ml-xxl">
			<EventsButton />
			<EventsPopup />
		</div>
		<div className="header-categories">
			<NavigationButton />
			<NavigationPopup />
		</div>
	</div>
)

export default Header
