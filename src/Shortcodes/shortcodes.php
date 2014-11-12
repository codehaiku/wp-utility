<?php
/**
 * This file simply loads and instantiates
 * all of the shortcodes.
 */

namespace news_hub\shortcodes;

/**
 * The list of shortcodes
 * @var array
 */
$shortcodesCollection = array(
		'RecentArticles', 
		'LatestVideos',
		'Reviews',
		'TopStories',
		'RandomPosts',
	);

foreach ($shortcodesCollection as $shortcode) 
{

	
	$namespace = __NAMESPACE__ . "\\";
	$class = $namespace . $shortcode;

	require_once $config->getSourcePath() . 'Shortcodes/Models/' . $shortcode . '.php';
	
		$$shortcode = new  $class();

}

?>