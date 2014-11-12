<?php
/**
 * This file declares NewsHubConfig class
 * that holds the global settings for our plugins
 * 
 * @package NewsHub
 * @subpackage Utility
 * @version 1.0
 */

class NewsHubConfig{

	/**
	 * The fancy version
	 * @var float
	 */
	public $version = 1.0;

	/**
	 * The plugin namespace. Used for localisation and namespacing
	 * @var string
	 */
	public $namespace = 'newshub_util';

	/**
	 * Holds the value of the plugin '/src' directory
	 * @var string
	 */
	protected $sourcePath = '';

	/**
	 * Nothing fancy here
	 */
	public function __construct()
	{
		$this->sourcePath = trailingslashit(plugin_dir_path( __FILE__ )); 

		return $this;
	}

	/**
	 * Returns the '/src' absolute path
	 * @return string the absolute path
	 */
	public function getSourcePath()
	{
		return $this->sourcePath;
	}

}

?>