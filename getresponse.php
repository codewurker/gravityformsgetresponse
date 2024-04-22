<?php
/*
Plugin Name: Gravity Forms GetResponse Add-On
Plugin URI: https://gravityforms.com
Description: Integrates Gravity Forms with GetResponse, allowing form submissions to be automatically sent to your GetResponse account.
Version: 1.7
Author: Gravity Forms
Author URI: https://gravityforms.com
License: GPL-2.0+
Text Domain: gravityformsgetresponse
Domain Path: /languages

------------------------------------------------------------------------
Copyright 2021 rocketgenius

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/

defined( 'ABSPATH' ) || die();

define( 'GF_GETRESPONSE_VERSION', '1.7' );

// If Gravity Forms is loaded, bootstrap the GetResponse Add-On.
add_action( 'gform_loaded', array( 'GF_GetResponse_Bootstrap', 'load' ), 5 );

/**
 * Class GF_GetResponse_Bootstrap
 *
 * Handles the loading of the GetResponse Add-On and registers with the Add-On Framework.
 */
class GF_GetResponse_Bootstrap {

	/**
	 * If the Feed Add-On Framework exists, GetResponse Add-On is loaded.
	 *
	 * @access public
	 * @static
	 */
	public static function load() {

		if ( ! method_exists( 'GFForms', 'include_feed_addon_framework' ) ) {
			return;
		}

		require_once( 'class-gf-getresponse.php' );

		GFAddOn::register( 'GFGetResponse' );

	}

}

/**
 * Returns an instance of the GFGetResponse class
 *
 * @see    GFGetResponse::get_instance()
 *
 * @return GFGetResponse
 */
function gf_getresponse() {
	return class_exists( 'GFGetResponse' ) ? GFGetResponse::get_instance() : null;
}
