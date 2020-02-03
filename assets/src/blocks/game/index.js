/* global wp */

import edit from './edit';
import save from './save';

const { registerBlockType } = wp.blocks;

registerBlockType(
	'oops-wp-demo/game',
	{
		title: "Game",
		category: "layout",
		icon: "wordpress",
		keywords: [ "board game" ],
		attributes: {
			id: {
				type: 'string',
				selector: 'p'
			},
			title: {
				type: 'string',
			},
			description: {
				type: 'string',
			}
		},
		edit,
		save,
	}
);
