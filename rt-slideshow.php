<?php
/**
 * This is rt-slideshow plugin file.
 *
 * @package rt_Slideshow
 *
 * Plugin Name:  rt Slideshow
 * Plugin URI:   https://github.com/hardikpanchal26/rt-Slideshow-Plugin
 * Description:  Simple and Easy Slideshow Plugin
 * Version:      1.0
 * Author:       Hardik Panchal
 * Author URI:   mailto:hardikpanchal551@gmail.com
 * License:      GPL2
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 */

// Do not allow access outside WordPress environment.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Believe me, This file is haunted. Go away!' );
}

// Includes all the functions used in plugin.
require plugin_dir_path( __FILE__ ) . 'includes/functions.php';

// Styles and scripts enqueued to the admin.
add_action( 'admin_enqueue_scripts', 'rt_slider_admin_scripts' );

// Styles and scripts enqueued to the frontend.
add_action( 'wp_enqueue_scripts', 'rt_slider_public_scripts' );

// Add settings link to plugin.
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'rt_slideshow_add_settings_link' );

// Plugin initialization.
add_action( 'init', 'rt_slideshow_register' );

// Adds Plugin's Meta-Boxes.
add_action( 'add_meta_boxes', 'rt_slideshow_metaboxes' );

// Save slideshow action.
add_action( 'save_post', 'rt_slideshow_save' );

// New messages for Save Slideshow action.
add_filter( 'post_updated_messages', 'rt_slideshow_messages' );

// Shortcode for rt Slideshow on frontend.
add_shortcode( 'rtslideshow', 'rt_slideshow_shortcode' );

// Add Button in tinymce visual editor.
add_filter( 'mce_external_plugins', 'rt_slideshow_register_tinymce_javascript' );

add_filter( 'mce_buttons', 'rt_slideshow_register_buttons' );
