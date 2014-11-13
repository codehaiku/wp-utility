<?php
/**
 * RecentPosts Widgets Template
 *
 * @version  1.0
 * @package NewsHub
 * @subpackage Widgets
 * @author  dunhakdis
 */
?>
<?php echo $this->vars->args['before_widget']; ?>
<?php
	if (!empty($this->vars->instance['title'])) {
		echo $this->vars->args['before_title'];
			echo apply_filters( 'widget_title', $this->vars->instance['title'] );
		echo $this->vars->args['after_title'];
	}
?>
<?php if (have_posts()) { ?>
<ul class="widget-latest-videos no-list rm-mg-left">
	<?php while(have_posts()) { ?>
	<?php the_post(); ?>
	<li <?php echo post_class('entry-post'); ?>>
		<?php if (has_post_thumbnail()) { ?>
			<div class="featured-image">
				<?php if (function_exists('news_hub_the_post_thumbnail()')) { ?>
					<?php echo news_hub_the_post_thumbnail('news-hub-latest-video'); ?>
				<?php } else { ?>
					<?php echo the_post_thumbnail('news-hub-latest-video'); ?>
				<?php } ?>

				<!--video details-->
				<div class="w-featured-image-entry-header">
					<div class="row">
						<div class="col-md-2 col-sm-2">
							<a class="white" href="<?php echo esc_url(the_permalink()); ?>" title="<?php echo esc_attr(the_permalink());?>">
								<span class="white fa-stack fa-lg">
									<i class="fa fa-circle-thin fa-stack-2x"></i>
									<i class="fa fa-play fa-stack-1x"></i>
								</span>
							</a>
						</div>
						<div class="col-md-10 col-sm-10">
							<h5>
								<a class="white" href="<?php echo esc_url(the_permalink()); ?>" title="<?php echo esc_attr(the_permalink());?>">
									<?php echo esc_attr(the_title()); ?>
								</a>
							</h5>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</li>
	<?php } ?>
	<div class="clearfix"></div>
</ul>

<?php } ?>
<?php echo $this->vars->args['after_widget']; ?>