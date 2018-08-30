<?php
/**
 * Template for slider-settings
 *
 * @package rt_Slideshow
 */

?>
<div class="inside">
	<table width="100%">
		<tr>
			<th>Effect </th>
			<td>
				<select id="rt_effect" name="slider[]">
					<option value="fade" <?php echo 'fade' === $slider_settings[0] ? 'selected' : ''; ?> >Fade</option>
					<option value="slide" <?php echo 'slide' === $slider_settings[0] ? 'selected' : ''; ?> >Slide</option>
					<option value="rotate" <?php echo 'rotate' === $slider_settings[0] ? 'selected' : ''; ?> >Rotate</option>
					<option value="zoom" <?php echo 'zoom' === $slider_settings[0] ? 'selected' : ''; ?> >Zoom</option>
					<option value="roll" <?php echo 'roll' === $slider_settings[0] ? 'selected' : ''; ?> >Roll</option>
					<option value="lightSpeed" <?php echo 'lightSpeed' === $slider_settings[0] ? 'selected' : ''; ?> >Light Speed</option>
				</select>
			</td>

			<th>Pause on hover </th>
			<td>
				<select id="rt_pause" name="slider[]">
					<option value="true" <?php echo 'true' === $slider_settings[1] ? 'selected' : ''; ?> >on</option>
					<option value="false" <?php echo 'false' === $slider_settings[1] ? 'selected' : ''; ?> >off</option>
				</select>
			</td>
		</tr>

		<tr>
			<th>Animation Speed </th>
			<td>
				<select id="rt_animspeed" name="slider[]">
					<option value="500" <?php echo '500' === $slider_settings[2] ? 'selected' : ''; ?> >500</option>
					<option value="1000" <?php echo '1000' === $slider_settings[2] ? 'selected' : ''; ?> >1000</option>
					<option value="2000" <?php echo '2000' === $slider_settings[2] ? 'selected' : ''; ?> >2000</option>
					<option value="3000" <?php echo '3000' === $slider_settings[2] ? 'selected' : ''; ?> >3000</option>
					<option value="4000" <?php echo '4000' === $slider_settings[2] ? 'selected' : ''; ?> >4000</option>
					<option value="5000" <?php echo '5000' === $slider_settings[2] ? 'selected' : ''; ?> >5000</option>
					<option value="6000" <?php echo '6000' === $slider_settings[2] ? 'selected' : ''; ?> >6000</option>
					<option value="7000" <?php echo '7000' === $slider_settings[2] ? 'selected' : ''; ?> >7000</option>
					<option value="8000" <?php echo '8000' === $slider_settings[2] ? 'selected' : ''; ?> >8000</option>
				</select>
				<span>ms</span>
			</td>

			<th>Pause Time</th>
			<td>
				<select id="rt_pausetime" name="slider[]">
					<option value="500" <?php echo '500' === $slider_settings[3] ? 'selected' : ''; ?> >500</option>
					<option value="1000" <?php echo '1000' === $slider_settings[3] ? 'selected' : ''; ?> >1000</option>
					<option value="2000" <?php echo '2000' === $slider_settings[3] ? 'selected' : ''; ?> >2000</option>
					<option value="3000" <?php echo '3000' === $slider_settings[3] ? 'selected' : ''; ?> >3000</option>
					<option value="4000" <?php echo '4000' === $slider_settings[3] ? 'selected' : ''; ?> >4000</option>
					<option value="5000" <?php echo '5000' === $slider_settings[3] ? 'selected' : ''; ?> >5000</option>
					<option value="6000" <?php echo '6000' === $slider_settings[3] ? 'selected' : ''; ?> >6000</option>
					<option value="7000" <?php echo '7000' === $slider_settings[3] ? 'selected' : ''; ?> >7000</option>
					<option value="8000" <?php echo '8000' === $slider_settings[3] ? 'selected' : ''; ?> >8000</option>
				</select>
				<span>ms</span>
			</td>
		</tr>
	</table>
</div>
