import { connect } from 'react-redux'
import Cover from '../../components/header/Cover'
import { setHeaderLoading } from '../../actions/header'

const mapStateToProps = (state) => ({
	url: state.header.coverUrl
})

export default connect(
	mapStateToProps,
	{
		setHeaderLoading
	},
	(sp, dp) => ({
		...sp,
		onLoad: () => dp.setHeaderLoading(false)
	})
)(Cover)
