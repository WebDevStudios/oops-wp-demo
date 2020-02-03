/* global wp */

const { registerBlockType } = wp.blocks;

registerBlockType(
	'oops-wp-demo/game',
	{
		title: "Game",
		category: "layout",
		icon: "wordpress",
		keywords: [ "board game" ],
		edit: () => '<h1>Hello</h1>',
		save: () => '<h1>Hello</h1>',
	}
);
