<?php
/**
 * Plugin Name: Give - Per Form User Role Assigner
 * Plugin URI:
 * Description: Allows you to set which User Role a donor will be assigned when they donate per form.
 * Author: Matt Cromwell
 * Author URI: https://givewp.com
 * Version: 1.0
 * Text Domain:
 * Domain Path: /languages
 * GitHub Plugin URI:
 *
 * Give - Per Form User Role Assigner is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * Give - Per Form User Role Assigner is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Give - Per Form User Role Assigner. If not, see <https://www.gnu.org/licenses/>.
 *
 * A Tribute to Open Source:
 *
 * "Open source software is software that can be freely used, changed, and shared (in modified or unmodified form) by anyone. Open
 * source software is made by many people, and distributed under licenses that comply with the Open Source Definition."
 *
 * -- The Open Source Initiative
 *
 * Give - Per Form User Role Assigner is a tribute to the spirit and philosophy of Open Source. We at WordImpress gladly embrace the Open Source philosophy both
 * in how Give - Setting API Fields Example itself was developed, and how we hope to see others build more from our code base.
 *
 * Give - Per Form User Role Assigner would not have been possible without the tireless efforts of WordPress and the surrounding Open Source projects and their talented developers. Thank you all for your contribution to WordPress.
 *
 * - The WordImpress Team
 *
 */

// Exit if access directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Load custom metabox and core settings.
 *
 * @since 1.0
 */
function give_setting_api_example_init() {
	if ( ! class_exists( 'Give' ) ) {
		return;
	}

	// Load metabox settings.
	require_once dirname( __FILE__ ) . '/includes/class-metabox-setting.php';

	// Load metabox settings.
	require_once dirname( __FILE__ ) . '/includes/user_role_logic.php';
}

add_action( 'plugins_loaded', 'give_setting_api_example_init' );

