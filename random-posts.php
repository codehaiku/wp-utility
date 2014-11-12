<?php $counter = 0; ?>
<?php $posts = $this->vars['posts']; ?>

<div class="news-hub-post-list">
	<div class="news-hub-shortcode-title">
		<?php if ($this->vars['title']) { ?>
		<h3>
			<?php echo esc_attr($this->vars['title']); ?>
		</h3>
		<?php } ?>
	</div>
	<?php if (have_posts()) { ?>
		<div class="row">
			<ul class="posts-list">
				<?php while(have_posts()){?>
				<?php the_post(); ?>
				<?php $counter ++;?>
				<?php $post_item = $posts[$counter-1]; ?>
				<li <?php echo post_class(array('col-md-6', 'entry-post')); ?>>
					<div class="nh-post-list-wr">
						<div class="col-md-5 col-sm-5">
							<a href="<?php echo esc_url(the_permalink()); ?>" title="<?php echo esc_attr(the_title()); ?>">
								<?php if (has_post_thumbnail()) {?>
									<?php the_post_thumbnail('entry-post-thumbnail'); ?>
								<?php } else { ?>
									<img src="<?php echo get_template_directory_uri(); ?>/images/entry-post-thumbnail.jpg" alt="<?php _e('Featured Image', 'news_hub'); ?>" class="attachment-entry-post-thumbnail wp-post-image" />
								<?php } ?>
							</a>
						</div>
						<div class="col-md-7 col-sm-7">
							<div>
								<div class="pull-left">
									<?php $category_colour = news_hub_the_category_list(false, $max = 1); ?>
									<div class="clearfix"></div>
									<div class="w-featured-image-details <?php echo $category_colour; ?>">
										<ul>
											<li>
												<span class="glyphicon glyphicon-calendar"></span>
												<span class="entry-date"><?php echo news_hub_get_the_date(); ?></span>
											</li>
											<li><span class="fa fa-comment-o"></span> 
												<?php echo number_format_i18n( get_comments_number() ); ?>
											</li>
										</ul>
									</div>
								</div>

								<div class="pull-right">
									<?php $author_url = get_author_posts_url($post_item->post_author); ?>
									<a class="<?php echo $category_colour; ?>" href="<?php echo esc_url($author_url); ?>" title="<?php _e('View Author Profile', 'news_hub'); ?>">
										<?php echo get_avatar($post_item->post_author, 48); ?>
									</a>
								</div>

								<div class="clearfix"></div>
							</div>
							<h5>
								<a href="<?php echo esc_url(the_permalink()); ?>" title="<?php echo esc_attr(the_title()); ?>" class="black">
									<?php $max_length = 40; ?>
									<?php $title = esc_attr(get_the_title()); ?>
									<?php if (strlen($title) >= $max_length) { ?>
									<?php $title = substr($title, 0, $max_length) . '&hellip;'; ?>
									<?php }?>
									<?php echo $title; ?>
								</a>
							</h5>
						</div>
						<div class="clearfix"></div>
					</div>

				</li>
				<?php } ?>
			</ul>
		</div><!--.row-->
		<?php } ?>
	</div>