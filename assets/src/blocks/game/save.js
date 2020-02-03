/**
 * Save controller for the oops-wp-demo/game block.
 *
 * @since 2020-02-03
 */
import React from 'react';

const GameSave = ( props ) => {
	const {
		title,
		description,
	} = props;

	return (
		<div className="oops-wp-demo-game">
			<h1>{title}</h1>
			<p>{description}</p>
		</div>
	);
};

export default GameSave;
