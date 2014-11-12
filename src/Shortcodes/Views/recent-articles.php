<?php
/**
 * Recent Articles shortcode template
 *
 * @version  1.0
 * @package NewsHub
 * @subpackage shortcodes
 */


$template = $this->vars;
$counter = 0;
$thumbnail_collection = array();

//make sure its unique
$recent_article_carousel_id = 'recent-article-id-'.time();
?>
<div class="news-hub-recent-articles">
	<div class="news-hub-shortcode-title">
		<h3>
			<?php echo esc_attr($template['title']); ?>
		</h3>
	</div>
<?php if (have_posts()) { ?>
<div class="carousel slide fading recent-article-carousel" data-ride="carousel" id="<?php echo $recent_article_carousel_id; ?>">
	<div class="carousel-inner">
	<?php while (have_posts()) { ?>
		<?php $counter ++; ?>
		<?php the_post(); ?>
		<?php $class = $counter === 1 ? 'active': ''; ?>
			<div class="item <?php echo $class; ?>">
				<div <?php echo post_class(array('entry-post')); ?>>
				<div class="col-md-6 col-sm-6">
					<a title="<?php echo esc_attr(the_title()); ?>" href="<?php echo esc_url(the_permalink()); ?>">
						<?php if (has_post_thumbnail()) {?>
							<?php the_post_thumbnail('shortcode-size'); ?>
						<?php } else { ?>
							<img src="<?php echo get_template_directory_uri(); ?>/images/shortcode-size.jpg" alt="<?php _e('Featured Image', 'news_hub'); ?>" />
						<?php } ?>
					</a>
					<?php if (has_post_thumbnail()) {?>
						<?php $thumbnail_collection[] = get_the_post_thumbnail(get_the_ID(), 'thumbnail');?>
					<?php } else { ?>
						<?php $thumbnail_collection[] = '<img src="'.get_template_directory_uri().'/images/thumbnail.jpg" alt="'.__('Featured Image', 'news_hub').'" />'; ?>
					<?php } ?>

				</div>
				<div class="col-md-6 col-sm-6">
					<div>
						<div class="pull-left">
							<?php $category_colour = news_hub_the_category_list(); ?>
						</div>

						<div class="pull-right">
							<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" title="<?php _e('View Author Profile', 'news_hub'); ?>">
								<?php  echo get_avatar(get_the_author_meta('ID')); ?>
							</a>
						</div>

						<div class="clearfix"></div>
					</div>
					<div class="clearfix">
							<h5>
								<a class="black" href="<?php echo esc_url(the_permalink());?>" title="<?php echo esc_attr(the_title()); ?>">
									<?php echo esc_attr(the_title()); ?>
								</a>
							</h5>
							<div class="clearfix"></div>
							<div class="w-featured-image-details <?php echo $category_colour; ?>">
								<ul>
                                        <li>
                                            <span class="glyphicon glyphicon-calendar"></span>
                                            <span class="entry-date"><?php echo news_hub_get_the_date(); ?></span>
                                        </li>
                                            <li><span class="fa fa-heart-o"></span> 12,781</li>
                                            <li><span class="fa fa-comment-o"></span> <?php echo number_format_i18n( get_comments_number() ); ?></li>
                                    </ul>
							</div>
							<?php the_excerpt(); ?>
					</div>		
						
				</div>
			<div class="clearfix"></div>
			</div><!--.entry-post-->
		</div><!--.item-->
	<?php } // end while ?>

	</div><!--.carousel-inner-->
	<?php if (!empty($thumbnail_collection)) { ?>
		<?php $counter = 0; //reset the counter ?>
		<div class="sr-onlsy">
			<div data-snap-to-carousel="<?php echo $recent_article_carousel_id . '-wrap'; ?>">
				<ol class="news-hub-recent-article-shortcode carousel-indicators">
					<?php foreach($thumbnail_collection as $thumbnail) { ?>
						<?php $counter++; ?>
						<li class="<?php echo ($counter === 1) ? 'active':''; ?>" data-target="#<?php echo $recent_article_carousel_id; ?>" data-slide-to="<?php echo $counter - 1; ?>">
							
								<?php echo $thumbnail; ?>
						</li>
					<?php } ?>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	<?php } ?>
</div>		
<?php } ?>
</div>