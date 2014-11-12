<?php
$counter = 0;
$i = 0;
?>
 <div class="news-hub-shortcode-latest-video entry-post">

    <div class="news-hub-shortcode-title">
        <?php if ($this->vars['title']) { ?>
            <h3><?php echo $this->vars['title']; ?></h3>
        <?php } ?>
    </div>

<?php global $wp_query; ?>

<?php $found_posts = $wp_query->query_vars['posts_per_page']; ?>

<?php if (have_posts()) { ?>
    <?php while(have_posts()) { ?>
    <?php the_post(); ?>
    <?php $counter++; ?>
    <?php
        // show larger section for the
        // first post
    ?>
    <?php if (1 === $counter) { ?>
       
            <div class="news-hub-shortcode-latest-video-wrap">
                <div <?php echo post_class(array('entry-post')); ?>>
                    <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="news-hub-shortcode-latest-video-featured-image">
                            <?php echo the_post_thumbnail('shortcode-size'); ?>
                            <div class="news-hub-shortcode-latest-video-control-wrap">
                                <div class="news-hub-shortcode-latest-video-control">
                                    <div class="news-hub-shortcode-latest-video-control-btn">
                                        <a href="<?php echo esc_url(the_permalink()); ?>" title="<?php echo esc_attr(the_title()); ?>">
                                            <span class="white fa-stack fa-lg">
                                                <i class="fa fa-circle-thin fa-stack-2x"></i>
                                                <i class="fa fa-play fa-stack-1x"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div>
                            <div>
                                <?php $category_colour = news_hub_the_category_list(); ?>
                                <div class="clearfix"></div>
                                    <a href="<?php echo esc_url(the_permalink()); ?>" title="<?php echo esc_attr(the_title()); ?>">
                                        <h5><?php echo the_title(); ?></h5>
                                    </a>
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
                            </div>
                           
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix">
                            <?php echo the_excerpt(); ?>
                        </div>
                    </div>
                </div>
            </div><!--.row-->
        </div>
    <?php } else { ?>
        <?php $i++; ?>
        <?php if ($i == 1) {?>
        <ul class="rm-mg">
        <?php } ?>
            <li <?php echo post_class(array('rm-mg', 'entry-post', 'col-md-6 col-sm-6', 'no-list', 'news-hub-video-post-list'));?>>
                <div class="nh-post-list-wr row">
                    <div class="col-md-4 col-sm-4">
                        <div class="news-hub-shortcode-latest-video-featured-image">
                            <?php if (has_post_thumbnail()){ ?>
                                <?php $category_colour = the_post_thumbnail('thumbnail'); ?>
                            <?php } else { ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/thumbnail.jpg" alt="<?php _e('Featured Image', 'news_hub'); ?>" />
                            <?php } ?>
                            <div class="news-hub-shortcode-latest-video-control-wrap">
                                <div class="news-hub-shortcode-latest-video-control">
                                    <div class="news-hub-shortcode-latest-video-control-btn">
                                        <a href="<?php echo esc_url(the_permalink()); ?>" title="<?php echo esc_attr(the_title()); ?>">
                                            <span class="white fa-stack fa-lg">
                                                <i class="fa fa-circle-thin fa-stack-2x"></i>
                                                <i class="fa fa-play fa-stack-1x"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <div>
                            <div class="pull-left">
                                <?php $category_colour = news_hub_the_category_list(); ?>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <h6>
                            <a href="<?php echo esc_url(the_permalink()); ?>" title="<?php echo esc_attr(the_title()); ?>" class="black">
                                <?php echo the_title(); ?>                           
                            </a>
                        </h6>
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
                    <div class="clearfix">
                    </div>
                </div>
               
            </li>
            <?php if ($i == $found_posts-1) { ?>

             </ul><!--.rm-mg-->
            <?php } ?>
    <?php } //endif?>
<?php } //endwhile ?>
<?php } //endif ?>
</div><!--.news-hub-shortcode-latest-video entry-post-->
<div class="news-hub-video-post-list news-hub-post-list">
    <div class="row">
        <ul></ul>
    </div>
    <!--.row-->
</div>