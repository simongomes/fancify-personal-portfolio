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
	register_block_type( __DIR__ . '/build' );
}
add_action( 'init', 'create_block_fancify_personal_portofolio_block_init' );


/**
 * Enqueues the necessary assets for the Fancify Personal Portfolio plugin.
 *
 * This function is responsible for loading the CSS and JavaScript files
 * required by the Fancify Personal Portfolio plugin to function properly.
 *
 * @return void
 */
function fancify_personal_portfolio_enqueue_assets() {
    // Enqueue the bundled JavaScript file.
    wp_enqueue_script(
        'fancify-personal-portfolio-blocks',
        plugins_url( 'build/index.js', __FILE__ ),
        array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components' ),
        filemtime( plugin_dir_path( __FILE__ ) . 'build/index.js' )
    );

    // Enqueue the editor-only styles.
    wp_enqueue_style(
        'fancify-personal-portfolio-blocks-editor',
        plugins_url( 'build/editor.css', __FILE__ ),
        array( 'wp-edit-blocks' ),
        filemtime( plugin_dir_path( __FILE__ ) . 'build/editor.css' )
    );

    // Enqueue the front-end styles.
    wp_enqueue_style(
        'fancify-personal-portfolio-blocks',
        plugins_url( 'build/style.css', __FILE__ ),
        array(),
        filemtime( plugin_dir_path( __FILE__ ) . 'build/style.css' )
    );
}
add_action( 'enqueue_block_assets', 'fancify_personal_portfolio_enqueue_assets' );
