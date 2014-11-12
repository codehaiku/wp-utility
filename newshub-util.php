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

require_once trailingslashit(plugin_dir_path( __FILE__ )) . 'src/config.php';

$config = new NewsHubConfig();

// load the shortcodes
require_once $config->getSourcePath() . 'Shortcodes/shortcodes.php';