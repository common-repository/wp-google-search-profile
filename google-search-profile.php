<?php
/*
* Plugin Name: Wp Google Search Profile
* Description: To add your social media profiles to your website’s Google Profile
* Author: AIS Technolabs
* Text Domain: wp-google-search-profile
* Author URI: https://www.aistechnolabs.com/
* Version: 1.0

*/

	
define( 'GSP_PLUGIN', __FILE__ );
define( 'GSP_DIR', __DIR__ );



function gsp_setting_menu(){
	add_menu_page('Google Search Profile', 'GSP Options', 'manage_options', 'google-search-profile', 'gsp_setting_page');
}
// Add menu action at WP-ADMIN
if(function_exists('gsp_setting_menu'))
	add_action('admin_menu', 'gsp_setting_menu');

function gsp_setting_page(){
	require_once "function.php";
}

/* Create options while Activation of Plugin */
function gsp_activate() {

	$options = array(
		'_gsp_type'=>'',
		'_gsp_name'=>'',
		'_gsp_facebook' => '',
		'_gsp_gplus' => '',
		'_gsp_twitter' => '',
		'_gsp_instagram' => '',
		'_gsp_youtube' => '',
		'_gsp_linkedin' => '',
	);
	
	foreach($options as $metaKey => $metaValue)
		if(get_option( $metaKey )=='')
			update_option( $metaKey, $metaValue );

}

if(function_exists('gsp_activate'))
	register_activation_hook( __FILE__, 'gsp_activate' );


/* Delete options while Deactivation of Plugin */
function gsp_deactivate() {
	delete_option( '_gsp_name');
	delete_option( '_gsp_type');
	delete_option( '_gsp_facebook' );
	delete_option( '_gsp_gplus' );
	delete_option( '_gsp_twitter' );
	delete_option( '_gsp_instagram' );
	delete_option( '_gsp_youtube' );
	delete_option( '_gsp_linkedin' );

}

if(function_exists('gsp_deactivate'))
	register_deactivation_hook( __FILE__, 'gsp_deactivate' );


function gsp_add_schema() {
    if(get_option('_gsp_type')){
    	$social = array();
    	$name=get_option('_gsp_name');
    	$type = get_option('_gsp_type');
    	$facebook = get_option('_gsp_facebook');
    	$gplus = get_option('_gsp_gplus');
    	$twitter = get_option('_gsp_twitter');
    	$instagram = get_option('_gsp_instagram');
    	$youtube = get_option('_gsp_youtube');
    	$linkedin = get_option('_gsp_linkedin');

    	
    	if($facebook != "" && $facebook != "https://www.facebook.com"){
    		$social[] = $facebook;
    	}
    	if($twitter != "" && $twitter != "https://www.twitter.com"){
    		$social[] = $twitter;
    	}
    	if($linkedin != "" && $linkedin != "https://www.linkedin.com/"){
    		$social[] = $linkedin;
    	}
    	if($youtube != "" && $youtube != "https://www.youtube.com"){
    		$social[] = $youtube;
    	}
    	if($instagram != "" && $instagram != "https://www.instagram.com"){
    		$social[] = $instagram;
    	}
       	if($gplus != "" && $gplus != "https://plus.google.com"){
    		$social[] = $gplus;
    	}
    	$socialschema = implode('","',$social);
    	if(sizeof($social) > 0 ){
	   	?>
    	 <script type="application/ld+json">
			{ "@context" : "http://schema.org/",
			"@type" : "<?php echo $type; ?>",
			"name" : "<?php echo $name; ?>",
			"url" : "<?php echo get_site_url(); ?>",
			"sameAs" : [ "<?php echo $socialschema; ?>"] 
			}
		</script> 
    	<?php
    	}
    }
}

if(function_exists('gsp_add_schema'))
	add_action('wp_head', 'gsp_add_schema');


