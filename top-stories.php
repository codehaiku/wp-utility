<section class="content-area">
<div class="news-hub-archive top-stories">
	<?php if ($this->vars['title']) { ?>
	    <header class="page-header">
	        <h1 class="page-title">
	        	<?php echo $this->vars['title']; ?>
	       	</h1>
	    </header>
    <?php } ?>
<?php if (have_posts()) { ?>
    <?php while(have_posts()) { ?>
        <?php the_post(); ?>   
        <?php get_template_part('content', 'archive'); ?>
    <?php } ?>
<?php } else {// endif ?>
<br />
<div class="alert alert-danger">
    <?php _e('There are no posts to show at this moment.', 'news_hub'); ?>
</div>
<?php } ?>
<?php news_hub_paging_nav(); ?>
 </div>
</section>