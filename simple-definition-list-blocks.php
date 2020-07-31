<?php
/**
 * Plugin Name:     Simple Definition List Blocks
 * Plugin URI:      https://github.com/chiilog/simple-definition-list-blocks
 * Description:     A simple definition list.
 * Author:          mel_cha
 * Author URI:      https://chiilog.com
 * Text Domain:     simple-definition-list-blocks
 * Domain Path:     /languages
 * Version: 0.2.5
 *
 * @package         Simple_Definition_List_Blocks
 */

defined( 'ABSPATH' ) || exit;

/**
 * Block registration.
 */
function simple_definition_list_blocks_register_block() {
	$asset_file = include plugin_dir_path( __FILE__ ) . 'build/index.asset.php';
	wp_register_script(
		'simple-definition-list-blocks',
		plugins_url( 'build/index.js', __FILE__ ),
		$asset_file['dependencies'],
		$asset_file['version'],
		true
	);

	wp_register_style(
		'simple-definition-list-blocks',
		plugins_url( 'build/index.css', __FILE__ ),
		array(),
		$asset_file['version']
	);

	register_block_type(
		'simple-definition-list-blocks/list',
		array(
			'editor_script' => 'simple-definition-list-blocks',
			'style'         => 'simple-definition-list-blocks',
		)
	);

	register_block_type(
		'simple-definition-list-blocks/term',
		array(
			'editor_script' => 'simple-definition-list-blocks',
			'style'         => 'simple-definition-list-blocks',
		)
	);

	register_block_type(
		'simple-definition-list-blocks/details',
		array(
			'editor_script' => 'simple-definition-list-blocks',
			'style'         => 'simple-definition-list-blocks',
		)
	);
}

add_action( 'init', 'simple_definition_list_blocks_register_block' );
