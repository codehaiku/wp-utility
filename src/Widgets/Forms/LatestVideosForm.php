<?php
/**
 * LatestVideos Widgets Form
 *
 * This file renders the template
 * for the LatestVideos Widget settings
 * and options
 *
 * @package NewsHub
 * @subpackage Widgets
 * @author dunhakdis
 */
?>
<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>">
		<?php _e( 'Title:' ); ?>
	</label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $this->vars->title ); ?>">
</p>