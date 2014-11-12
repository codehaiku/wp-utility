<?php
/**
 * This file loads our widgets
 *
 * @version 1.0
 * @package NewsHub
 * @subpackage Widgets
 * @author  dunhakdis
 */

namespace newshub\widgets;

use Exception;

/**
 * The list of widgets
 * @var array
 */
$widgetsCollection = array(
	'RecentPosts',
	);

// iterate through each widgets listed
// inside $widgetsCollection array and
// require the needed file and then 
// instantiate to register the widget
foreach ($widgetsCollection as $widget) 
{

	$namespace = __NAMESPACE__ . "\\";
	$class = $namespace . $widget;

	$widgetModel = $config->getSourcePath() . 'Widgets/Models/' . $widget . '.php';

	if (file_exists($widgetModel)) {

		require_once $widgetModel;
		
		add_action( 'widgets_init', array($class, 'registerWidget') );

	} 
	else 
	{
		throw new Exception('Widget model is not found');
	}
}
?>