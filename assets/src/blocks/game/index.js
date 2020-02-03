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
		edit,
		save,
	}
);
