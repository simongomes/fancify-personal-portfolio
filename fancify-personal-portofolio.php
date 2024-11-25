<?php
/**
 * Plugin Name:       Fancify Personal Portofolio
 * Description:       WordPress Gutenberg block to display personal portofolio.
 * Requires at least: 6.6
 * Requires PHP:      7.2
 * Version:           0.1.0
 * Author:            Simon Gomes
 * Author URI:        https://github.com/simongomes
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       fancify-personal-portofolio
 *
 * @package CreateBlock
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function create_block_fancify_personal_portofolio_block_init() {
	// Register about block
	register_block_type( __DIR__ . '/build/about' );
}
add_action( 'init', 'create_block_fancify_personal_portofolio_block_init' );