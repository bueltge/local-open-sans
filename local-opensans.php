<?php
/**
 * Plugin Name: Local Open Sans
 * Description: Use a local version of the Google Open Sans font.
 * Plugin URI:  https://github.com/bueltge/local-open-sans
 * Version:     0.1
 * Author:      Frank Bültge
 * Author URI:  http://bueltge.de/
 * License:     GPLv2+
 * License URI: ./assets/license.txt
 * 
 * Php Version 5.3
 * 
 * @package WordPress
 * @author  Frank Bültge <frank@bueltge.de>
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */

namespace Local_Open_Sans;

// Exit if accessed directly
defined( 'ABSPATH' ) || die();

add_action( 'wp_default_styles', __NAMESPACE__ . '\enqueue_local_open_sans', 999 );
/**
 * Replace Open Sans url with local path
 * 
 * @param  Array $styles
 * @return Array $styles
 */
function enqueue_local_open_sans( $styles ) {
	
	// No Open Sans, exit
	if ( empty( $styles->registered[ 'open-sans' ] ) )
		return $styles;
		
	// Replace scr
	if ( FALSE !== strpos( $styles->registered['open-sans']->src, 'fonts.googleapis.com' ) )
		$styles->registered[ 'open-sans' ]->src = plugin_dir_url( __FILE__ )
			. 'css/open-sans.css';
	
	return $styles;
}
