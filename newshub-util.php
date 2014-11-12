<?php
/**
 * Plugin Name: NewsHub Utility
 * Plugin URI: http://dunhakdis.me
 * Description: This plugin adds few shortcodes, widgets, and other things to your WordPress theme. However, the styling of this plugin was solely created for NewsHub WordPress theme. Browse the source code to see if you can use some of its functionality :)
 * Version: 1.0
 * Author: Dunhakdis
 * Author URI: http://dunhakdis.me
 * Text Domain: news_hub
 * License: GPL2
 */

/* =================================================================::=============================================================*/

/** 
 * Recent Article Shortcode
 *
 * @package NewsHub
 * @subpackage shortcodes
 * @version 1.0
 */

namespace news_hub\shortcodes;

require_once trailingslashit(plugin_dir_path( __FILE__ ) . 'src/config.php');

/*

require_once trailingslashit(get_template_directory()) . 'shortcodes/interface.php';
require_once trailingslashit(get_template_directory()) . 'shortcodes/RandomPosts.php';
require_once trailingslashit(get_template_directory()) . 'shortcodes/RecentArticles.php';
require_once trailingslashit(get_template_directory()) . 'shortcodes/LatestVideos.php';
require_once trailingslashit(get_template_directory()) . 'shortcodes/Reviewss.php';
require_once trailingslashit(get_template_directory()) . 'shortcodes/TopStories.php';

new RandomPosts();
new RecentArticles();
new LatestVideos();
new Reviews();
new TopStories();

// add the tinymce plugin
require_once trailingslashit(get_template_directory()) . 'shortcodes/tiny-mce.php';
?>