import * as React from 'react'

const hideable = (Component) => (props) => (
	props.hidden ? <div /> : <Component { ...props } />
)

export default hideable
