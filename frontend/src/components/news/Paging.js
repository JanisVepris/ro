import * as React from 'react'

const Paging = ({
	currentPage,
	pageCount,
	onPageChange,
	hidden
}) => {

	if (hidden) {
		return <div />
	}

	const elements = []

	for (var i = 1; i <= pageCount; i++) {
		elements.push(<div key={ i }>{ i }</div>)
	}

	const pages = new Array(pageCount)
		.fill(0)
		.map((_page, index) => index + 1)

	return (
		<div>
			<div className="paging-title">Puslapiai:</div>
			{ currentPage !== 1 && 
				<div className="paging-block" onClick={ () => onPageChange(currentPage - 1) }> { '<' }</div>
			}
			{ pages.map(page => {
				
				const className = "paging-block" + (page === currentPage ? ' active' : '')
				return <div key={ page } className={ className } onClick={ () => onPageChange(page) }>{ page }</div>
			})}
			{ pageCount > 1 && currentPage !== pageCount && 
				<div className="paging-block" onClick={ () => onPageChange(currentPage + 1) }> { '>' } </div>
			}
		</div>
	)
}

export default Paging
