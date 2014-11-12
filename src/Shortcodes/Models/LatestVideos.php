<?php
/**
 * LatestVideos
 *
 * @package NewsHub
 * @subpackage shortcode
 */

namespace news_hub\shortcodes;
	
require_once $config->getSourcePath() . 'Shortcodes/interface.php';

/**
 * Displays latest video via shortcode
 *
 * @version  1.0
 * @author   <codehaiku.io@gmail.com>
 */
class LatestVideos implements NewsHubShortcode{

	/**
	 * The title of the shortcode
	 * @var string
	 */
	public $shortcodeTitle = 'Latest Videos';

	/**
	 * the maximum number of entry
	 * @var integer
	 */
	public $maxItem = 10;	

	/**
	 * the unique name of our shortcode
	 * @var string
	 */
	private $shortcodeName = 'news_hub_latest_videos';

	/**
	 * The vars we can pass into our template
	 * @var array
	 */
	private $vars = array();

	/**
	 * The shortcode attribute
	 * @var mixed
	 */
	private $attributes;

	/**
	 * this method serve as a wrapper for wordpress' 
	 * add_action('init') function
	 * 
	 * @return object self
	 */
	public function __construct() 
	{ 
		$this->config = new \NewsHubConfig();

		add_action('init', array($this, 'register'));

		return $this;
	}

	/**
	 * registers the shortcode via add_shortcode
	 * @return object useful for chaining methods
	 */
	public function register()
	{

		add_shortcode($this->shortcodeName, array($this, 'handler'));

		return $this;

	}

	/**
	 * Configurable options: max-item, title
	 *
	 * @param  array $attributes wordpress shortcode callback parameter
	 * @return object self
	 */
	public function handler($attributes)
	{

		$this->attributes = shortcode_atts(
			array(
 	      			'max_item' => 5,
 	      			'title' => $this->shortcodeTitle,
      			), 
      		$attributes, 
      		$this->shortcodeName
      	);

		$this->attributes['max_item'] = abs($this->attributes['max_item']);

		// do not allow unlimited option
		if ($this->attributes['max_item'] <= 0) {
			$this->attributes['max_item'] = 5;
		}

		query_posts(array(
				// do not allow more than 5 items in slider
				// it is breaking the layout -_-
				'posts_per_page' => ($this->attributes['max_item'] <= $this->maxItem) ? $this->attributes['max_item'] : $this->maxItem,
				'ignore_sticky_posts' => TRUE,
				'tax_query' => array(
					array(
						'taxonomy' => 'post_format',
						'field' => 'slug',
						'terms' => array( 'post-format-video' ),
						'operator' => 'IN',
					),
				),
			));

		$this->vars = array(
				'title' => esc_attr($this->attributes['title']),
			);

		$template = $this->template();

		wp_reset_query();

		return $template;

	}

	/**
	 * Loads the template for this shortcode
	 * @return object self
	 */
	public function template()
	{

		ob_start();
		
		include $this->config->getSourcePath() . 'Shortcodes/Views/latest-videos.php';

		return $output = ob_get_clean();
	}

}
?>