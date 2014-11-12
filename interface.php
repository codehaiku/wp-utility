<?php
/**
 * NewsHub Shortcodes Interface
 *
 * @package NewsHub
 * @subpackage shortcodes
 * @version 1.0
 */

namespace news_hub\shortcodes;

Interface NewsHubShortcode{

	/**
	 * includes the template for the specific shortcode
	 */
	public function register();

	/**
	 * [handler description]
	 * @param  [type] $atts [description]
	 * @return [type]       [description]
	 */
	public function handler($atts);

	/**
	 * [template description]
	 * @return [type] [description]
	 */
	public function template();
}
?>