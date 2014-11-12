console.log('im ehere!!');

jQuery(document).ready(function($) {

	var $select_template = '<select id="news_hub_shortcode_selector">';
			$select_template += '<option value="">- Click to begin -</option>';
			$select_template += '<option value="news_hub_recent_articles">Recent Articles</option>';
			$select_template += '<option value="news_hub_random_post">Random Posts</option>';
			$select_template += '<option value="news_hub_latest_videos">Latest Videos</option>';
			$select_template += '<option value="news_hub_top_stories">Top Stories</option>';
			$select_template += '<option value="news_hub_reviews">Reviews</option>';
		$select_template += '</select>';

	$('body').append('<div id="hiddenModalContent" style="text-align:center; display: inline-block;"><p>Select: '+$select_template+'</p></div>');

	$('#hiddenModalContent').dialog({autoOpen: false, modal: true, title: 'Shortcode Selection', dialogClass: "no-close"});

    tinymce.create('tinymce.plugins.wpse72394_plugin', {
        init : function(ed, url) {
                // Register command for when button is clicked
                ed.addCommand('wpse72394_insert_shortcode', function() {
                    
                    var content = "";

                    $('#hiddenModalContent').dialog('open');

                    console.log('outside init');
                    
                    var i = 0;

                    $('#news_hub_shortcode_selector').change(function(){

                    	i++;

                    	// prevent duplicate trigger bug
                    	// happening when change event
                    	// is being called inside tinymce init
                    	// event
                    	if (i == 1){


                    	var selected_shortcode = $(this).val();
                    		content = '['+selected_shortcode+' max_item=""]';
                    	//tinymce.execCommand('mceInsertContent', false, content);

                    	tinymce.execCommand('mceInsertContent', false, content);

                    	$('#hiddenModalContent').dialog('close');

                    	console.log('inside change event');

	                    } else {
	                    	return;
	                    }

                    });
                    
                    
                });

            // Register buttons - trigger above command when clicked
            var icon = 'http://local.dev/news_hub/wp-content/plugins/wp-user-avatar/images/wpua-20x20.png';
            ed.addButton('wpse72394_button', {title : 'Insert shortcode', cmd : 'wpse72394_insert_shortcode', image: icon });
        },   
    });

    // Register our TinyMCE plugin
    // first parameter is the button ID1
    // second parameter must match the first parameter of the tinymce.create() function above
    tinymce.PluginManager.add('wpse72394_button', tinymce.plugins.wpse72394_plugin);
});