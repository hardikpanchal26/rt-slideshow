<?php
/**
 * Template for save-slideshow
 *
 * @package rt_Slideshow
 */

?>
<div id="submitpost" class="inside" >
	<p>To use rt Slideshow in your post or page Save Slideshow and use the following shortcode:</p>
	<h2 class="highlight"><strong>[rtslideshow id=<?php echo esc_attr( $post->ID ); ?>]</strong></h2>
	<div id="major-publishing-actions" class="major-publishing-actions">
		<div id="publishing-action">
			<span class="spinner"></span>
			<input name="original_publish" type="hidden" id="original_publish" value="Save Slideshow">
			<input type="submit" name="publish" id="publish" class="button button-primary button-large" value="Save Slideshow">
		</div>
		<div class="clear"></div>
	</div>
</div>
