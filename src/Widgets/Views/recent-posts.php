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
<?php if (have_posts()) { ?>
<ul class="widget-recent-post no-list rm-mg-left">
	<?php while(have_posts()) { ?>
	<?php the_post(); ?>
	<li <?php echo post_class('entry-post'); ?>>
		<div class="col-md-3 col-sm-4">
			<?php if (function_exists('news_hub_the_thumbnail')) { ?>
				<?php news_hub_the_thumbnail('thumbnail'); ?>
			<?php } else { ?>
				<?php the_post_thumbnail('thumbnail'); ?>
			<?php } ?>
		</div>
		<div class="col-md-8 col-sm-8">
			<h6>
				<a class="black" href="<?php echo esc_url(the_permalink()); ?>" title="<?php echo esc_attr(the_title()); ?>">
					<?php echo esc_attr(the_title()); ?>
				</a>
			</h6>
		</div>
		<div class="clearfix"></div>
	</li>
	<?php } ?>
	<div class="clearfix"></div>
</ul>
<div class="center">
	<h6><a href="#">See More Posts</a></h6>
</div>
<?php } ?>
<?php echo $this->vars->args['after_widget']; ?>