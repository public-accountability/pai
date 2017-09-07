<?php
/**
 * Jetpack Compatibility File
 *
 * @link https://jetpack.me/
 *
 * @package understrap
 * @subpackage pai
 * @since 0.1.0
 */

/**
 * Don't concatenate JetPack styles
 *
 * @since 0.1.1
 */
add_filter( 'jetpack_implode_frontend_css', '__return_false' );
