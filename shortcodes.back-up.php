<?php
class NewsHub_Shortcodes{

	/**
	 * shortcodes collection
	 * @var array
	 */
	var $modules = array(
			'random-post',
			'recent-articles',
			'latest-videos',
			'reviews',
			'top-stories',
		);

	public function __construct()
	{
		
		foreach($this->modules as $module)
		{
			
			$module = str_replace('-', '_', sanitize_title($module));

			if (method_exists($this, $module))
			{
			
				$shortcode_name = 'news_hub_' . $module;
					add_shortcode($shortcode_name, array($this, $module));
				
			} 
			else 
			{
				throw new Exception($module . ' does not exist on NewsHub_Shortcodes');	
			}
			
		}
		
		return;
	}

	public static function random_post()
	{
		ob_start();

		$module_file = get_template_directory() . '/shortcodes/random-post.php';
			require_once($module_file);

		return ob_get_clean();
	}

	public static function recent_articles()
	{
		ob_start();

		$module_file = get_template_directory() . '/shortcodes/recent-articles.php';
			require_once($module_file);

		return ob_get_clean();
	}

	public static function latest_videos(){
		ob_start();

		$module_file = get_template_directory() . '/shortcodes/latest-videos.php';
			require_once($module_file);

		return ob_get_clean();
	}

	public static function reviews()
	{
		ob_start();

		$module_file = get_template_directory() . '/shortcodes/reviews.php';
			require_once($module_file);

		return ob_get_clean();
	}

	function top_stories()
	{
		ob_start();

		$module_file = get_template_directory() . '/shortcodes/top-stories.php';
			require_once($module_file);

		return ob_get_clean();
	}

}

new NewsHub_Shortcodes();
?>