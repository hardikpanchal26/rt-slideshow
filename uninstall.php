<?php
/**
 * This files triggers on rt-slideshow plugin uninstall.
 *
 * @package rt_Slideshow
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die( 'Believe me, This file is haunted. Go Away!' );
}

// Delete all plugin's data.
global $wpdb;
$wpdb->query( "DELETE FROM ".$wpdb->prefix."posts WHERE post_type = 'rt-slideshow'" );
$wpdb->query( 'DELETE FROM '.$wpdb->prefix.'postmeta WHERE post_id NOT IN (SELECT ID FROM wp_posts)' );
$wpdb->query( 'DELETE FROM '.$wpdb->prefix.'term_relationships WHERE object_id NOT IN (SELECT ID FROM wp_posts)' );
