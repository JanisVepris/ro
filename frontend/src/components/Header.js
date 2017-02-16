import * as React from 'react'
import '../styles/main.scss'

import EventsButton from '../containers/header/events-button'
import EventsPopup from '../containers/header/events-popup'

const Header = () => (
	<div className="header">
		<div>
			<EventsButton />
			<EventsPopup />
		</div>
	</div>
)

export default Header
