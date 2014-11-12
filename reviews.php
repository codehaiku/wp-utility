<?php 
$classes = array('first', 'second');
$counter = 0;

global $wp_query;
?>

<div class="news-hub-reviews">
	<div class="news-hub-shortcode-title">
        <?php if ($this->vars['title']) { ?>
            <h3>
                <?php echo $this->vars['title']; ?>
            </h3>
        <?php } ?>
    </div>

<?php $posts_per_page = $wp_query->query_vars['posts_per_page']; //-1 since $counter begins at 0 ?>

<?php if (have_posts()) { ?>
  <div class="news-hub-reviews-wrap">
    <?php while(have_posts()){ ?>
        <?php $counter++; ?>
        <?php //show bigger section for first two entries ?>
        <?php the_post(); ?>

        <?php if ($counter == 1){?>
           <div class="<?php echo $counter; ?> col-md-6 col-sm-6">
        <?php } ?>
        <?php if ($counter < 3) { ?>
                    <div class="col-md-6 col-sm-6 entry-post <?php echo $classes[$counter-1]; ?>">
                        <a href="<?php echo esc_url(the_permalink()); ?>" title="<?php echo esc_attr(the_title()); ?>">
                            <?php if (has_post_thumbnail()) { ?>
                                <?php echo the_post_thumbnail('entry-post-thumbnail'); ?>
                            <?php } else { ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/entry-post-thumbnail.jpg" alt="<?php _e('Featured Image', 'news_hub'); ?>">
                            <?php } ?>
                        </a>
                        
                        <h6>
                            <a class="black" href="<?php echo esc_url(the_permalink()); ?>" title="<?php echo esc_attr(the_title()); ?>">
                                <?php echo esc_attr(the_title()); ?>
                            </a>
                        </h6>

                        <div class="row">
                            <div class="rating col-md-5 rm-padding-right">
                                <?php news_hub_the_rating(); ?>
                            </div>
                            <div class="w-featured-image-details col-md-7 rm-padding-left">
                                <ul>
                                    <li>
                                        <span class="glyphicon glyphicon-calendar"></span>
                                        <span class="entry-date"><?php echo news_hub_get_the_date(); ?></span>
                                    </li>
                                    <li><span class="fa fa-comment-o"></span> <?php echo number_format_i18n( get_comments_number() ); ?></li>
                                </ul>
                            </div>
                        </div>
                        
                        <?php echo the_excerpt(); ?>
                    </div>
               
        <?php } else { ?>
            <?php if ($counter == 3) { ?>
                </div><!--.col-md-6-->
                <div class="<?php echo $counter; ?> col-md-6 col-sm-6">
            <?php } ?>
                <div class="row entry-post">
                    <div class="col-md-3 col-sm-3">
                        <a href="<?php echo esc_url(the_permalink()); ?>" title="<?php echo esc_attr(the_title()); ?>">
                            <?php if (has_post_thumbnail()) { ?>
                                <?php echo the_post_thumbnail('entry-post-thumbnail'); ?>
                            <?php } else { ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/entry-post-thumbnail.jpg" alt="<?php _e('Featured Image', 'news_hub'); ?>">
                            <?php } ?>
                        </a>
                    </div>
                    <div class="col-md-9 col-sm-9">
                        <h6>
                            <a class="black" href="<?php echo esc_url(the_permalink()); ?>" title="<?php echo esc_attr(the_title()); ?>">
                                <?php echo the_title(); ?>
                            </a>
                        </h6>
                         <div class="clearfix">
                            <div class="rating pull-left">
                                <?php news_hub_the_rating(); ?>
                            </div>
                            <div class="w-featured-image-details pull-left">
                                <ul>
                                    <li>
                                        <span class="glyphicon glyphicon-calendar"></span>
                                        <span class="entry-date"><?php echo news_hub_get_the_date(); ?></span>
                                    </li>
                                    <li><span class="fa fa-comment-o"></span> <?php echo number_format_i18n( get_comments_number() ); ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div><!--.entry-post-->
               
            <?php if ($counter == $posts_per_page ) { ?>
                </div>
            <?php } ?>
        <?php } //end else?>
    <?php } //endwhile ?>
    <div class="clearfix"></div>
</div><!--.news-hub-reviews-wrap-->
<?php } else { ?>
<div class="alert alert-danger">
    <i class="fa fa-alert"></i>
    <?php _e('There are no reviews to show at this time.', 'news_hub'); ?>
</div>
<?php } ?>
</div><!--.news-hub-reviews-->
<?php wp_reset_query(); ?>
<div class="clearfix "></div>