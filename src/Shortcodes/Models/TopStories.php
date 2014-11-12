<?php
/**
 * Top Stories
 *
 * @package NewsHub
 * @subpackage shortcode
 */

namespace news_hub\shortcodes;
	
/**
 * Displays top stories via shortcode
 *
 * @version  1.0
 */
class TopStories implements NewsHubShortcode{

	/**
	 * The title of the shortcode
	 * @var string
	 */
	public $shortcodeTitle = 'Top Stories';

	/**
	 * the maximum number of entry
	 * @var integer
	 */
	public $maxItem = 5;

	/**
	 * the unique name of our shortcode
	 * @var string
	 */
	private $shortcodeName = 'news_hub_top_stories';

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
 	      			'max_item' => 5,
 	      			'title' => $this->shortcodeTitle,
      			), 
      		$attributes, 
      		$this->shortcodeName
      	);

		// do not allow unlimited option
		if ($this->attributes['max_item'] == 0) 
		{
			$this->attributes['max_item'] = 5;
		}

		// default params
		query_posts(array(
				'posts_per_page' => $this->attributes['max_item'],
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
		
		include $this->config->getSourcePath() . 'Shortcodes/Views/top-stories.php';

		return $output = ob_get_clean();
	}

}
?>