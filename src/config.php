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
	 * Holds the source path of the plugin
	 * @var string
	 */
	protected $pluginPath = '';

	/**
	 * Holds the url of the plugin
	 * @var  string
	 */
	protected $pluginUrl = '';
	
	/**
	 * Nothing fancy here
	 */
	public function __construct()
	{
		
		$this->sourcePath = trailingslashit(plugin_dir_path( __FILE__ )); 
		
		$this->pluginPath = $this->sourcePath . '../';

		$this->pluginUrl = trailingslashit(plugins_url('newshub-util'));

		return $this;
	}

	/**
	 * Returns the plugin root path
	 * @return string the absolute path to the root directory of this plugin
	 */
	public function getPluginPath()
	{
		return $this->pluginPath;
	}

	/**
	 * Returns the '/src' absolute path
	 * @return string the absolute path
	 */
	public function getSourcePath()
	{
		return $this->sourcePath;
	}

	/**
	 * Returns the url of the plugin
	 * @return  string the url of the plugin
	 */
	public function getPluginUrl()
	{
		return esc_url($this->pluginUrl);
	}	




}

?>