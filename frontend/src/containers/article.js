import { connect } from 'react-redux'
import ArticleComponent from '../components/routes/Article'

const mapStateToProps = (state) => {
	
	const { 
		activeArticle,
		articleById,
		articleLoading
	} = state.events

	const article = articleById[activeArticle]

	return {
		headerLoading: state.header.loading,
		articleLoading,
		title: article && article.title,
		content: article && article.content,
		date: article && article.date
	}
}

export default connect(
	mapStateToProps
)(ArticleComponent)
