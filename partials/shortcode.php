<?php
/**
 * Template for save-slideshow
 *
 * @package rt_Slideshow
 */

?>

<script>
	$(window).load(function() {
		var slider_settings = <?php echo wp_json_encode( $slider_settings ); ?>;		
		$("#rt_slider_<?php echo esc_attr( $slideshow['id'] ); ?>").owlCarousel( {
			loop: true,
			center: true,
			items: 1,
			margin:30,
			autoplay: true,
	    	nav:true,
			autoplayTimeout: parseInt(slider_settings[3]),
			smartSpeed: parseInt(slider_settings[2]),
			animateIn: (slider_settings[0] == 'slide') ? false : slider_settings[0] + 'In',
			animateOut: (slider_settings[0] == 'slide') ? false : slider_settings[0] + 'Out',
			autoplayHoverPause: (slider_settings[1] == 'true' ) ? true : false,
			navText: ['<i class="fa fa-caret-left"></i>','<i class="fa fa-caret-right"></i>'],
		}); 
	});

</script>
<div id="rt_slider_<?php echo esc_attr( $slideshow['id'] ); ?>" class="owl-carousel">
	<?php foreach ( $image_data as $image ) : ?>
		<div class="item">
		<img class="img-responsive" src="<?php echo esc_url( wp_get_attachment_image_src( $image, 'full' )[0] ); ?>" />
		</div>
	<?php endforeach; ?>
</div>
