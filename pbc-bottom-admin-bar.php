<?php
/*
Plugin Name: Pbc bottom admin bar
Plugin URI: http://poweredbycoffee.com/
Description: Reposition the admin bar to the bottom of each page.
Version: 1.0.0
Author: Graeme White 
Released under the GNU General Public License (GPL)
http://www.gnu.org/licenses/gpl.txt
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class pbcMoveAdminBar {

	function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'move_admin_bar' ) );
	}

	function move_admin_bar() {

		if(!is_admin_bar_showing()) {
			return;
		}

	    wp_enqueue_style( 'pbc-move-admin-bar' , plugin_dir_url( __FILE__ ) . 'css/pbc-bottom-admin-bar.css' , array() , 1.00 , false );

	}
}

new pbcMoveAdminBar();
