<?php
/**
 * Adds users the ability to 
 * generate the shortcode easily
 * inside the wordpress post editor
 */

// init process for registering our button

add_action('admin_enqueue_scripts', '__dialog');

function __dialog(){
	wp_enqueue_script('jquery-ui-dialog');
	wp_enqueue_style("wp-jquery-ui-dialog");
}

 add_action('init', 'wpse72394_shortcode_button_init');
 function wpse72394_shortcode_button_init() {

      //Abort early if the user will never see TinyMCE
      if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') && get_user_option('rich_editing') == 'true')
           return;

      //Add a callback to regiser our tinymce plugin   
      add_filter("mce_external_plugins", "wpse72394_register_tinymce_plugin"); 

      // Add a callback to add our button to the TinyMCE toolbar
      add_filter('mce_buttons', 'wpse72394_add_tinymce_button');
}


//This callback registers our plug-in
function wpse72394_register_tinymce_plugin($plugin_array) {
    $plugin_array['wpse72394_button'] = trailingslashit(get_template_directory_uri()) . 'shortcodes/tinymce.js';
    return $plugin_array;
}

//This callback adds our button to the toolbar
function wpse72394_add_tinymce_button($buttons) {
            //Add the button ID to the $button array
    $buttons[] = "wpse72394_button";
    return $buttons;
}
?>