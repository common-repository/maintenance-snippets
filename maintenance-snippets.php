<?php 

/**
 * Plugin Name: Maintenance Snippets
 * Description: This plugin gives you a report of plugins that need updates.
 * Plugin URI: https://matheuswd.com.br/maintenance-snippet
 * Author: Matheus Martins
 * Author URI: https://matheuswd.com.br/
 * Version: 0.1.0
 * License: GPL2
 * Text Domain: maintenance-snippets
 * Domain Path: /languages
 */

/*
    Copyright (C) 2017  Matheus Martins  matheus-wordpress@matheuswd.com.br

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'MAINTENANCE_SNIPPETS_VERSION', '0.1.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-maintenance-snippet-activator.php
 */
function activate_maintenance_snippets() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-maintenance-snippets-activator.php';
	Maintenance_Snippets_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-maintenance-snippet-deactivator.php
 */
function deactivate_maintenance_snippets() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-maintenance-snippets-deactivator.php';
	Maintenance_Snippets_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_maintenance_snippets' );
register_deactivation_hook( __FILE__, 'deactivate_maintenance_snippets' );


add_action( 'admin_menu', 'maintenance_snippets_menu' );

/**
 * Register the menu for the admin area
 *
 *
 * @since 0.1.0
 */

function maintenance_snippets_menu() {
	add_plugins_page(__('Maintenance Snippet', 'maintenance-snippets'), __('Maintenance Snippet', 'maintenance-snippets'), 'administrator', 'maintenance-snippets/snippets.php' );
}
