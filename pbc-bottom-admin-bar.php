<?php
/*
Plugin Name: PBC bottom admin bar
Plugin URI: http://poweredbycoffee.co.uk/
Description: Reposition the admin bar to the bottom of each page.
Version: 1.0.0
Author: Graeme White 
Released under the GNU General Public License (GPL v2)
https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class pbcMoveAdminBar {

	function __construct() {
		add_action( 'wp_head', array( $this, 'move_admin_bar' ) );
	}

	function move_admin_bar() {

		if(!current_user_can('manage_options')) {
			return;
		}

	    echo '
	    <style type="text/css">
	    body.admin-bar #wphead {
	       padding-top: 0;
	    }
	    #wpadminbar {
	        top: auto !important;
	        bottom: 0;
	        position: fixed;
	    }
	    #wpadminbar .quicklinks .menupop ul {
	        position: absolute;
	        bottom: 32px;
	        background-color: #23282d;
	    }
	    #wpadminbar .quicklinks .menupop ul + ul {
			bottom: 70px;
		}
	    #wpadminbar .quicklinks .menupop ul ul {
			transform: translateY(62px);
			-webkit-transform: translateY(62px);
			-ms-transform: translateY(62px);
		}
		#wpadminbar .quicklinks .menupop ul.ab-sub-secondary {
			bottom: 64px;
			position: absolute;
		}
		@media screen and (max-width: 782px) {
			#wpadminbar .quicklinks .menupop ul {
				bottom: 46px;
			}

			#wpadminbar .quicklinks .menupop ul + ul,
			#wpadminbar .quicklinks .menupop ul.ab-sub-secondary {
				bottom: 86px;
			}

			#wpadminbar .quicklinks .menupop ul ul {
				transform: translateY(92px);
				-webkit-transform: translateY(92px);
				-ms-transform: translateY(92px);
			}
		}
	    </style>';
	}
}

new pbcMoveAdminBar();
