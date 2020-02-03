<?php
use WebDevStudios\OopsWPDemo\Content\Shortcode\NewestGame;
use WebDevStudios\OopsWPDemo\Content\Shortcode\NewestGameData;

/**
 * Template for the newest_game shortcode.
 *
 * This template outputs the name and description of a game from the BoardGameGeek API. The `$shortcode` variable
 * is set inside the render method of the NewestGame object, which also provides other getters for us to retrieve
 * the data that's already been processed by the class files.
 *
 * @var $shortcode NewestGame
 * @var $game NewestGameData
 * @since 2020-02-03
 */

// If we don't have a game, there's nothing to output, so let's bail.
$game = $shortcode->get_game();

if ( ! $game ) {
	return;
}

// Optional shortcode content.
$content = $shortcode->get_content();
?>

<div class="wds-newest-game-shortcode">
	<div class="wds-newest-game-details">
		<h1><?php echo esc_html( $game->get_name() ); ?></h1>
		<p><?php echo esc_html( $game->get_description() ); ?></p>
	</div>

	<?php if ( $content ) : ?>
		<p class="wds-newest-game-notes"><?php echo esc_html( $content ); ?></p>
	<?php endif; ?>
</div>
