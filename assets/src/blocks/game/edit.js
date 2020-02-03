/* global wp */
import React, { useEffect } from 'react';
import axios from 'axios';

const {
	components: {
		Button,
	},
	editor: {
		RichText
	}
} = wp;

const searchUrl = (id) => `https://oops-wp.localhost/wp-json/oops-wp-demo/v1/boardgame/${id}`;

const GameEdit = (props) => {
	const {
		setAttributes,
		isSelected,
		id,
		title,
		description,
	} = props;

	const handleGameId = (id) => {
		console.log(`setting attribute on id ${id}`);
		setAttributes({ id });
	};

	const makeRequest = (e) => {
		if (! id) {
			return;
		}

		const gameUrl = searchUrl(id);
		console.log(gameUrl);

		axios.get(gameUrl).then((result) => {
			console.log(result);
		});
	};

	useEffect(() => {
		if (! title) {
			return;
		}

		},
		() => {}
	);

	return (
		<>
			<div className="oops-wp-demo-game">
				{isSelected && (
					<form onSubmit={makeRequest}>
						<RichText
							value={id}
							placeholder={id}
							onChange={handleGameId}
						/>
						<Button isPrimary>Submit</Button>
					</form>
				)}
				<h1>{title}</h1>
				<p>{description}</p>
			</div>
		</>
	);
};

export default GameEdit;
