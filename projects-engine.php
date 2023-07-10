<?php

/**
 * Projects Engine
 *
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License, version 3 or higher
 *
 * @wordpress-plugin
 * Plugin Name: LMS Ronan
 * Version:     1.9.2
 * Description: The first true all-in-one solutions manager for WordPress, including page content creation, plugin development, sitemaps and much more.
 * Author:      Ronan
 * Text Domain: projects-engine-plugin
 * Domain Path: /languages/
 * License:     GPL v3
 * Requires at least: 5.5
 * Requires PHP: 7.3.9
 *
 * PEP requires at least: 3.0
 * PEP tested up to: 5.1
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

if (!defined('ABSPATH')) {
	// Exit if accessed directly.
	exit;
}

define('PE_PLUGIN_DOMAIN', 'projects-engine');
define('PE_PLUGIN_VERSION', '1.9.2');
define('PE_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('PE_PLUGIN_URL', plugin_dir_url(__FILE__));
define('MINIMUM_ELEMENTOR_VERSION', '2.0.0');
define('MINIMUM_PHP_VERSION', '7.0');

// require PE_PLUGIN_PATH . '/gutenberg/main.php';
// require PE_PLUGIN_PATH . '/includes/main.php';
// require PE_PLUGIN_PATH . '/woocommerce/main.php';
require PE_PLUGIN_PATH . '/elementor/class-elementor.php';

add_action('after_setup_theme', 'pe_theme_setup');
/**
 * Add woocommerce support to your theme.
 */
function pe_theme_setup()
{
	add_theme_support('woocommerce');
}
