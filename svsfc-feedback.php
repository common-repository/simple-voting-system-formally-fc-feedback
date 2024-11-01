<?php
/**
 * Plugin Name: Simple Voting System Formally Fc Feedback
 * Plugin URI: https://wordpress.org/plugins/simple-voting-system-formally-fc-feedback
 * Description: WordPress plugin allows website visitors to vote on various articles
 * Version: 1.0.0
 * php version 8.0.0
 * Author: Adnan Hyder Pervez
 * Author URI: https://profiles.wordpress.org/adnanhyder/
 * Developer: Adnan
 * Developer URI: 12345adnan@gmail.com
 * Text Domain: svsfc-feedback
 * Domain Path: /languages
 *
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 *
 * @category Plugin
 * @package  svsfc-Feedback
 * @author   Adnan Hyder Pervez <12345adnan@gmail.com>
 * @license  GNU General Public License v3.0
 * @link     #
 */


use SVSFC_Feedback\SVSFC_Core;

defined('ABSPATH') || exit;



if (! defined('SVSFC_PLUGIN_FILE') ) {
    define('SVSFC_PLUGIN_FILE', __FILE__);
}

if (! defined('SVSFC_PLUGIN_VERSION') ) {
    define('SVSFC_PLUGIN_VERSION', '1.0.0');
}

if (! defined('SVSFC_PLUGIN_DIR') ) {
    define('SVSFC_PLUGIN_DIR', __DIR__);
}

if (! defined('SVSFC_INCLUDES_DIR') ) {
    define('SVSFC_INCLUDES_DIR', SVSFC_PLUGIN_DIR . DIRECTORY_SEPARATOR . 'includes');
}

if (! defined('SVSFC_VENDOR_DIR') ) {
    define('SVSFC_VENDOR_DIR', SVSFC_PLUGIN_DIR . DIRECTORY_SEPARATOR . 'vendor');
}

if (! defined('SVSFC_PLUGIN_SRC_URL') ) {
    define('SVSFC_PLUGIN_SRC_URL', plugin_dir_url(SVSFC_PLUGIN_FILE) . 'src');
}

$loader = include_once SVSFC_VENDOR_DIR . DIRECTORY_SEPARATOR . 'autoload.php';

if (! $loader ) {
    throw new Exception('vendor/autoload.php missing please run `composer install`');
}

/**
 * Activation and Deactivation hooks for WordPress
 */

if (! function_exists('svsfc_extension_activate') ) {
    /**
     * Activation Hook for WordPress.
     *
     * @since  1.0.0
     * @return void
     */
    function svsfc_extension_activate()
    {
        //Add any Activation tasks here
        // (e.g., Removal of free version, Create Databases).
    }

    register_activation_hook(__FILE__, 'svsfc_extension_activate');
}

if (! function_exists('svsfc_extension_deactivate') ) {
    /**
     * Deactivation hook for WordPress.
     *
     * @since  1.0.0
     * @return void
     */
    function svsfc_extension_deactivate()
    {
        // Add any deactivation tasks here (e.g., cleanup, data removal).
        // This code will be executed once when the plugin is deactivated.
    }

    register_deactivation_hook(__FILE__, 'svsfc_extension_deactivate');
}

if (! function_exists('svsfc_initialize') ) {
    /**
     * Initialize the plugin.
     *
     * @since  1.0.0
     * @return SVSFC_Core Instance of the SVSFC_Core class.
     */
    function svsfc_initialize(): ?SVSFC_Core
    {

        static $fc;

        if (! isset($fc) ) {
            $fc = SVSFC_Core::instance();
        }

        $GLOBALS['svsfc_feedback'] = $fc;

        return $fc;
    }

    add_action('plugins_loaded', 'svsfc_initialize', 10);
}
