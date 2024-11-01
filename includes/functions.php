<?php
/**
 * SVSFc Feedback Functions.
 * This file contains all the functions which are used in the plugin.
 *
 * Php version 8.0.0
 *
 * @category Plugin
 * @package  svsfc-Feedback
 * @author   Adnan Hyder Pervez <12345adnan@gmail.com>
 * @license  GNU General Public License v3.0
 * @link     #
 */

if (! defined('ABSPATH') ) {
    exit; // Exit if accessed directly.
}

if (! function_exists('svsfc_sanitize_thing') ) {
    /**
     * Recursive sanitation for text, integer or array.
     *
     * @param array|string $var Array or string to sanitize.
     *
     * @since  1.0.0
     * @return string
     */
    function svsfc_sanitize_thing( $var )
    {

        if (is_array($var) ) {
            return array_map('svsfc_sanitize_thing', $var);
        } else {
            return is_scalar($var) ? sanitize_text_field(wp_unslash($var)) : $var;
        }
    }
}
