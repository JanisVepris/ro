import { connect } from 'react-redux'
import AppComponent from '../components/App'

const mapStateToProps = (state) => ({
	initialized: state.app.initialized
})

export default connect(
	mapStateToProps
)(AppComponent)
