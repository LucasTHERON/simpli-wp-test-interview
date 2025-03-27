<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>
<p <?php echo get_block_wrapper_attributes(); ?>>
	<p style="display:inline-block" class="content"><?php esc_html_e( 'Hello World !', 'block-lucas' ); ?></p>
	<button id="reverse-text">Inverser le texte</button>
</p>
