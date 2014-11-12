<?php
/**
 * This file declares the class
 * of the RecentPosts Widgets
 *
 * @version  1.0
 * @package NewsHub
 * @subpackage Widgets
 * @author dunhakdis
 */

namespace newshub\widgets;

use NewsHubConfig;

Class RecentPosts extends \WP_Widget{

	/**
	 * The name of this Widget
	 * @var string
	 */
	public $widgetName = 'NewsHub: Recent Posts';

	/**
	 * Unique identifier for our widget
	 * @var string
	 */
	public $id = 'newshubRecentPosts';

	/**
	 * Holds variables to be displayed in the template
	 * @var stdClass
	 */
	private $vars;

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {

		$this->vars = new \stdClass;
		$this->config = new NewsHubConfig();	

		// widget actual processes
		parent::__construct($this->id, $this->widgetName);

		return $this;
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {

		// outputs the content of the widget
		
		$this->vars->args = $args;
		$this->vars->instance = $instance;

		query_posts(array(
				'posts_per_page' => 5,
			));

			echo $this->template();
		wp_reset_query();
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {

		ob_start();
		// outputs the options form on admin
		if (isset($instance['title'])) {
			$this->vars->title = $instance[ 'title' ];
		} else {
			$this->vars->title = __( 'Recent Posts', 'news_hub' );
		}
		
		require $this->config->getSourcePath() . 'Widgets/Forms/RecentPostsForm.php';

		$output = ob_get_clean();

		echo $output;
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

	/**
	 * Registers the widget into WordPress
	 *
	 * @uses  register_widget() registers the widget
	 * @return object self::
	 */
	public static function registerWidget(){

		register_widget(static::class);

	}

	/**
	 * Loads the template for this Widget
	 * @return string the template output
	 */
	private function template()
	{
		ob_start();

		include_once $this->config->getSourcePath() . 'Widgets/Views/recent-posts.php';

		$output = ob_get_clean();

		return $output;
	}
}
?>