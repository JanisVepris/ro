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
		elements.push(<div  key={ i }>{ i }</div>)
	}

	// pasirefactoring, cia biski baisu
	return (
		<div>
			<p>Puslapis:</p>
			current: { currentPage }
			{ 
				elements.map((element, index) => (
					<div key={ index } onClick={ () => onPageChange(index + 1) }>
						{ element }
					</div>
				))
			}
			total: { pageCount }
		</div>
	)
}

export default Paging
