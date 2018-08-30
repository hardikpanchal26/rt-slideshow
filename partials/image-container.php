<?php
/**
 * Template for image-container
 *
 * @package rt_Slideshow
 */

?>
<div class="inside">
	<p class="instruction">Add Images and Drag to change order of Images in Slideshow.</p>
</div>

<div class="inside images_area">
	<p>Your images are displayed here</p>
	<ul id="sortable" class="images_container">
		<?php foreach ( $image_data as $image ) : ?>
			<li class="ui-state-default">
				<div class="image_container">
					<img src="<?php echo esc_url( wp_get_attachment_image_src( $image )[0] ); ?>" />
					<span class="close" ><i class="fa fa-close"></i></span>
					<input type="hidden" name=images[] value="<?php echo esc_attr( $image ); ?>"/>
				</div>
			</li>
		<?php endforeach; ?>
	</ul>
</div>

<div class="inside">
	<p>Click on Save Slideshow to save added Images.</p>
	<button id="add_images" class="button button-primary">Add Images</button>
	<input type="submit" name="remove_images" id="remove_images" class="button button-primary" value="Remove All Images"/>
</div>
