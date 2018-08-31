<?php
/**
 * Functions of the rt slideshow plugin
 *
 * @package rt_Slideshow
 */

/** Callback function for admin_enqueue_scripts. Enqueues admin styles and scripts. */
function rt_slider_admin_scripts() {

	wp_enqueue_style( 'rt-stylesheet', plugins_url( 'assets/css/rt-stylesheet.css', __DIR__ ), array(), '1.5.0' );
	wp_enqueue_style( 'font-awesome', plugins_url( 'lib/font-awesome-4.7.0/css/font-awesome.min.css', __DIR__ ), array(), '4.7.0' );

	wp_enqueue_media();
	wp_enqueue_script( 'rt-images-handler', plugins_url( 'assets/js/rt-images-handler.js', __DIR__ ), array(), '1.1.0', false );
}

/** Callback function for wp_enqueue_scripts. Enqueues public styles and scripts. */
function rt_slider_public_scripts() {
	wp_enqueue_style( 'owl-carousel-stylesheet', plugins_url( 'lib/owl-carousel/owl.carousel.css', __DIR__ ), array(), '2.3.5' );
	wp_enqueue_style( 'animate', plugins_url( 'lib/animate-3.7.0/animate.css', __DIR__ ), array(), '3.7.0' );
	wp_enqueue_style( 'font-awesome', plugins_url( 'lib/font-awesome-4.7.0/css/font-awesome.min.css', __DIR__ ), array(), '4.7.0' );
	wp_enqueue_style( 'rt-stylesheet-public', plugins_url( 'assets/css/rt-stylesheet-public.css', __DIR__ ), array(), '1.4.0' );

	wp_enqueue_script( 'jquery-updated', plugins_url( 'lib/owl-carousel/jquery-1.9.0.min.js', __DIR__ ), array(), '1.9.1', false );
	wp_enqueue_script( 'owl-carousel-script', plugins_url( 'lib/owl-carousel/owl.carousel.js', __DIR__ ), array(), '2.3.4', false );
}


/** Creates Custom Post Type rt Slideshow. */
function rt_slideshow_register() {
	register_post_type(
		'rt-slideshow', array(

			'public'              => false,
			'publicly_queryable'  => true,
			'show_ui'             => true,
			'exclude_from_search' => true,
			'show_in_nav_menus'   => false,
			'has_archive'         => false,
			'rewrite'             => false,
			'menu_position'       => 26,
			'menu_icon'           => 'dashicons-images-alt',
			'label'               => 'rt Slideshow',
			'labels'              => array(
				'name'               => _x( 'rt Slideshows', 'post type general name' ),
				'singular_name'      => _x( 'rt Slideshow', 'post type singular name' ),
				'menu_name'          => _x( 'rt Slideshow', 'admin menu' ),
				'name_admin_bar'     => _x( 'rt Slideshow', 'add new on admin bar' ),
				'add_new'            => _x( 'Add New Slideshow', 'rt-slideshow' ),
				'add_new_item'       => __( 'Add New Slideshow' ),
				'new_item'           => __( 'rt Slideshow' ),
				'edit_item'          => __( 'rt Slideshow' ),
				'view_item'          => __( 'rt Slideshow' ),
				'all_items'          => __( 'All Slideshows' ),
				'search_items'       => __( 'Search Slideshow' ),
				'not_found'          => __( 'No slideshows found.' ),
				'not_found_in_trash' => __( 'No slideshows found in Trash.' ),
			),
			'supports'            => array( 'title' ),
		)
	);
}


/**
 * Callback function for adding settings link.
 *
 * @param (array) $links - array of links availabe on plugin page.
 */
function rt_slideshow_add_settings_link( $links ) {
	$settings_link = '<a href="' . admin_url( 'edit.php?post_type=rt-slideshow' ) . '">Settings</a>';
	array_unshift( $links, $settings_link );
	return $links;
}

/**
 * Updates the messages that appears on clicking Save Slideshow.
 *
 * @param (array) $messages - array of messages to be updated.
 */
function rt_slideshow_messages( $messages ) {
	global $post, $post_ID;
	$messages['rt-slideshow'] = array(
		0 => '',
		2 => __( 'Slideshow has been saved.' ),
		3 => __( 'Slideshow has been deleted.' ),
		4 => __( 'Slideshow has been saved.' ),
		6 => __( 'Slideshow has been saved.' ),
		7 => __( 'Slideshow has been saved.' ),
	);
	return $messages;
}

/** Add metaboxes for the post type - rt-slideshow. */
function rt_slideshow_metaboxes() {
	
	remove_meta_box( 'submitdiv', 'rt-slideshow', 'side' );

	add_meta_box(
		'rt_image_container',
		'Add Images for Slideshow',
		'image_container',
		'rt-slideshow',
		'normal',
		'high'
	);

	add_meta_box(
		'rt_slider_settings',
		'Slideshow Settings',
		'slider_settings',
		'rt-slideshow',
		'normal',
		'high'
	);

	add_meta_box(
		'rt_save_slideshow',
		'Save Slideshow',
		'save_slideshow',
		'rt-slideshow',
		'side',
		'high'
	);

	add_meta_box(
		'rt_developer_info',
		'Proudly Developed By',
		'developer_info',
		'rt-slideshow',
		'side',
		'high'
	);

}

/** Metaxbox1 callback function. */
function image_container() {
	global $post;

	$image_data = ( metadata_exists( 'post', $post->ID, 'rt_slideshow_images_data' ) ) ? get_post_meta( $post->ID, 'rt_slideshow_images_data', true ) : array();
	require plugin_dir_path( __DIR__ ) . 'partials/image-container.php';

}

/** Metaxbox2 callback function. */
function slider_settings() {
	global $post;
	// $slider_settings = //array('fade','false','1000','3000');
	$slider_settings = ( metadata_exists( 'post', $post->ID, 'rt_slideshow_settings' ) ) ? get_post_meta( $post->ID, 'rt_slideshow_settings', true ) : array( 'fade', 'true', '1000', '3000', '500' );

	require plugin_dir_path( __DIR__ ) . 'partials/slider-settings.php';

}

/** Metaxbox3 callback function. */
function save_slideshow() {

	global $post;
	require plugin_dir_path( __DIR__ ) . 'partials/save-slideshow.php';
}

/** Metaxbox4 callback function. */
function developer_info() {

	require plugin_dir_path( __DIR__ ) . 'partials/developer-info.php';
}

/** Saving the rt Slideshow. **/
function rt_slideshow_save() {
	global $post;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Nonce ( number used once ) as per WordPress security standards.
	$rt_nonce = wp_create_nonce( 'theSecurityNumber' );

	if ( wp_verify_nonce( $rt_nonce, 'theSecurityNumber' ) && isset( $_POST['remove_images'] ) ) {
		update_post_meta( $post->ID, 'rt_slideshow_images_data', array() );

	} else {

		if ( isset( $_POST['images'] ) ) {
			$image_id_array = array_map( 'sanitize_text_field', wp_unslash( $_POST['images'] ) );
			update_post_meta( $post->ID, 'rt_slideshow_images_data', $image_id_array );
		} elseif ( isset( $_POST['remove_images'] ) ) {

			update_post_meta( $post->ID, 'rt_slideshow_images_data', array() );
		}

		if ( isset( $_POST['slider'] ) ) {
			$slider_settings_array = array_map( 'sanitize_text_field', wp_unslash( $_POST['slider'] ) );
			update_post_meta( $post->ID, 'rt_slideshow_settings', $slider_settings_array );
		}
	}
}


/**
 * Shortcode function for rt Slideshow on frontend.
 *
 * @param (array) $atts - additional attributes passed in a shortcode.
 */
function rt_slideshow_shortcode( $atts ) {
	$slideshow = shortcode_atts( array( 'id' => '' ), $atts );

	$image_data = ( metadata_exists( 'post', $slideshow['id'], 'rt_slideshow_images_data' ) ) ? get_post_meta( $slideshow['id'], 'rt_slideshow_images_data', true ) : array();

	$slider_settings = ( metadata_exists( 'post', $slideshow['id'], 'rt_slideshow_settings' ) ) ? get_post_meta( $slideshow['id'], 'rt_slideshow_settings', true ) : array();

	require plugin_dir_path( __DIR__ ) . 'partials/shortcode.php';
}

/**
 * Call the tinymce javascript file (php version).
 *
 * @param (array) $plugin_array - array of tinymce plugin.
 */
function rt_slideshow_register_tinymce_javascript( $plugin_array ) {
	$list = array();
	$row  = get_posts(
		array(
			'post_type'   => 'rt-slideshow',
			'numberposts' => -1,
		)
	);

	foreach ( $row as $r ) {

		$text = ( $r->post_title == '' ) ? $r->ID : $r->post_title;
		$data = array(
			'text'  => $text,
			'value' => 'id=' . $r->ID,
		);
		array_push( $list, $data );
	}
	$list = wp_json_encode( $list );

	$plugin_array['button'] = plugins_url( '/includes/tinymce.js', __DIR__ );
	wp_enqueue_script( 'rt-tinymce', plugins_url( '/includes/tinymce.js', __DIR__ ), array(), '1.1.0', false );
	wp_localize_script( 'rt-tinymce', 'list', $list );
	return $plugin_array;
}

/**
 * Specification of button on the tinymce.
 *
 * @param (array) $buttons - array of tinymce buttons to be added.
 */
function rt_slideshow_register_buttons( $buttons ) {
	array_push( $buttons, 'button' );
	return $buttons;
}
