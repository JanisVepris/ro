import * as React from 'react'

const Footer = () => (
	<footer>
		<p className="footer-title mt">ORGANIZATORIAI</p>
		<div className="footer-contacts-container">
			<div>KONTAKTAI</div>
			<label>info@mifsa.lt</label>
		</div>
		<i className="vusa-mif-icon float-right" onClick={() => { window.open('http://mif.vusa.lt/') }} />
		<i className="midi-icon float-right" onClick={() => { window.open('http://midi.lt/') }} />
		<i className="midi-ro-icon float-right" />
	</footer>
)

export default Footer
