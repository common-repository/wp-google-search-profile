<?php

  if (!current_user_can('manage_options')) {
    wp_die('You do not have sufficient permissions to access this page.');
}

	if(isset($_POST['gsp_nonce_field']) && wp_verify_nonce($_POST['gsp_nonce_field'], 'gsp_form_action')){
			if(isset($_POST['submit_gsp']) && $_POST['submit_gsp'] == "Save Changes"){

				if(isset($_POST['gsp_name']))
					update_option('_gsp_name',sanitize_text_field($_POST['gsp_name']));
				if(isset($_POST['gsp_type']))
					update_option('_gsp_type',sanitize_text_field($_POST['gsp_type']));
				if(isset($_POST['gsp_fb']))
					update_option('_gsp_facebook',sanitize_text_field($_POST['gsp_fb']));
				if(isset($_POST['gsp_twt']))
					update_option('_gsp_twitter',sanitize_text_field($_POST['gsp_twt']));
				if(isset($_POST['gsp_linkedin']))
					update_option('_gsp_linkedin',sanitize_text_field($_POST['gsp_linkedin']));
				if(isset($_POST['gsp_gplus']))
					update_option('_gsp_gplus',sanitize_text_field($_POST['gsp_gplus']));
				if(isset($_POST['gsp_youtube']))
					update_option('_gsp_youtube',sanitize_text_field($_POST['gsp_youtube']));
				if(isset($_POST['gsp_instagram']))
					update_option('_gsp_instagram',sanitize_text_field($_POST['gsp_instagram']));

			}
	}

?>

</head>

<div id="wpbody-content" aria-label="Main content" tabindex="0">
	<div class="wrap">
		<h1> Google Search Profiles </h1>
<hr/>
		<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" novalidate="novalidate">
		  <?php wp_nonce_field('gsp_form_action', 'gsp_nonce_field'); ?>

		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row"><label for="gps_type"><?php esc_html_e("Select Type", 'wp-google-search-profile' ); ?>  </label></th>
					<td>
						<label>
							<input type="radio" name="gsp_type" value="Person" <?php echo (get_option('_gsp_type'))?'checked="checked"':""; ?>> <span class="date-time-text format-i18n"> Person </span>
						</label>
						<label>
							<input type="radio" name="gsp_type" value="Organization" <?php echo (get_option('_gsp_type'))?'checked="checked"':""; ?>> <span class="date-time-text format-i18n"> Organization</span>
						</label>
					
					</td>
				</tr>

				<tr>
					<th scope="row"><label for="gsp_name"><?php esc_html_e("Name", 'wp-google-search-profile' ); ?></label></th>
					<td><input name="gsp_name" type="text" id="gsp_name" value="<?php echo get_option('_gsp_name'); ?>" class="regular-text" placeholder="Name"></td>
				</tr>

				<tr>
					<th scope="row"><label for="gsp_fb"><?php esc_html_e("Facebook Profile", 'wp-google-search-profile' ); ?></label></th>
					<td><input name="gsp_fb" type="text" id="gsp_fb" value="<?php echo get_option('_gsp_facebook'); ?>" class="regular-text" placeholder="Facebook Profile URL"></td>
				</tr>
				<tr>
					<th scope="row"><label for="gsp_twt"><?php esc_html_e("Twittre Profile", 'wp-google-search-profile' ); ?></label></th>
					<td><input name="gsp_twt" type="text" id="gsp_twt" value="<?php echo get_option('_gsp_twitter'); ?>" class="regular-text" placeholder="Twitter Profile URL"></td>
				</tr>
				<tr>
					<th scope="row"><label for="gsp_linkedin"><?php esc_html_e("Linkedin Profile", 'wp-google-search-profile' ); ?></label></th>
					<td><input name="gsp_linkedin" type="text" id="gsp_linkedin" value="<?php echo get_option('_gsp_linkedin'); ?>" class="regular-text" placeholder="Linkedin Profile URL"></td>
				</tr>
				
				<tr>
					<th scope="row"><label for="gsp_youtube"><?php esc_html_e("Youtube Profile", 'wp-google-search-profile' ); ?></label></th>
					<td><input name="gsp_youtube" type="text" id="gsp_youtube" value="<?php echo get_option('_gsp_youtube'); ?>" class="regular-text" placeholder="Youtube Profile URL"></td>
				</tr>
				<tr>
					<th scope="row"><label for="gsp_instagram"><?php esc_html_e("Instagram", 'wp-google-search-profile' ); ?></label></th>
					<td><input name="gsp_instagram" type="text" id="gsp_instagram" value="<?php echo get_option('_gsp_instagram'); ?>" class="regular-text" placeholder="Instagram Profile URL"></td>
				</tr>
				<tr>
					<th scope="row"><label for="gsp_gplus"><?php esc_html_e("Google Plus", 'wp-google-search-profile' ); ?></label></th>
					<td><input name="gsp_gplus" type="text" id="gsp_gplus" value="<?php echo get_option('_gsp_gplus'); ?>" class="regular-text" placeholder="Google Plus Profile URL"></td>
				</tr>
			</tbody>
		</table>
	
		<p class="submit"><input type="submit" name="submit_gsp" id="submit_gsp" class="button button-primary" value="Save Changes"></p></form>

	</div>
</div>


