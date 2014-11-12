<?php
/**
 * RandomPosts
 *
 * @package NewsHub
 * @subpackage shortcode
 */

namespace news_hub\shortcodes;
	
/**
 * Displays random posts
 *
 * @version  1.0
 * @author   <codehaiku.io@gmail.com>
 */
class RandomPosts implements NewsHubShortcode{

	/**
	 * The title of the shortcode
	 * @var string
	 */
	public $shortcodeTitle = 'Random Posts';

	/**
	 * the maximum number of entry
	 * @var integer
	 */
	public $maxItem = 12;	

	/**
	 * the unique name of our shortcode
	 * @var string
	 */
	private $shortcodeName = 'news_hub_random_post';

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
 	      			'max_item' => 6,
 	      			'title' => __('', 'news_hub'),
      			), 
      		$attributes, 
      		$this->shortcodeName
      	);

		// do not allow unlimited option
		if ($this->attributes['max_item'] == 0) {
			$this->attributes['max_item'] = $this->maxItem;
		}

		$posts = query_posts(array(
				// do not allow more than 5 items in slider
				// it is breaking the layout -_-
				'posts_per_page' => ($this->attributes['max_item'] <= $this->maxItem) ? $this->attributes['max_item'] : $this->maxItem,
				'ignore_sticky_posts' => TRUE,
				'orderby' => 'rand',
			));

		$this->vars = array(
				'title' => esc_attr($this->attributes['title']),
				'posts' => $posts
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
		
		include $this->config->getSourcePath() . 'Shortcodes/Views/random-posts.php';

		return $output = ob_get_clean();
	}

}
?>