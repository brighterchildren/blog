<?php
if ( is_admin() ) {

	// Change "enter title here" for the_title on landing pages
	function change_default_title( $title ) {
		$screen = get_current_screen();

		if  ( 'landing-page' == $screen->post_type ) {
			$title = 'Enter Landing Page Admin Title here. Example: Free Whitepaper - Variation A';
		}

		return $title;
	}

	add_filter( 'enter_title_here', 'change_default_title' );

	// end change of title function
	// Custom styling of post state function
	function custom_post_states( $post_states ) {
		foreach ( $post_states as &$state ) {
			$state = '<span class="'.strtolower( $state ).' states">' . str_replace( ' ', '-', $state ) . '</span>';
		}
		return $post_states;
	}


	add_filter( 'display_post_states', 'custom_post_states' );
	function custom_post_states_css() {
		echo '<style>
					.post-state .states{
							font-size:10px;
							padding:3px 8px 3px 8px;
							-moz-border-radius:2px;
							-webkit-border-radius:2px;
							border-radius:2px;
							}
					.post-state .password{background:#000;color:#fff;}
					.post-state .pending{background:#83CF21 !important;color:#fff;}
					.post-state .private{background:#E0A21B;color:#fff;}
					.post-state .draft{background:#006699;color:#fff;}
				  </style>';
	}
	add_action( 'admin_head', 'custom_post_states_css' );
	// end Custom styling of post state function
	// Start custom opt in
	/* Display a notice that can be dismissed */
	add_action( 'admin_notices', 'lp_sub_admin_notice' );
	function lp_sub_admin_notice() {
		global $current_user ;
		$user_id = $current_user->ID;
		global $pagenow;
		// show notice only on these pages
		if ( $pagenow == 'edit.php' ) {
			/* Check that the user hasn't already clicked to ignore the message */
			if ( ! get_user_meta( $user_id, 'inbound_ignore_notice1' ) ) {
				echo '<div class="updated" style="width:500px;"><p>';
				printf( __( '<a href="%1$s">I have subscribed</a>' ), '?example_nag_ignore=0' );
?>
			<!-- Begin MailChimp Signup Form -->
			<style type="text/css">
				#mc_embed_signup{background:none; clear:left; font:14px Helvetica,Arial,sans-serif; }
				#mc_embed_signup .button{color: #333;};
				/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
				   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
			</style>
			<div id="mc_embed_signup">
			<form action="http://www.inboundnow.com/NewsLetterSub.php" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
				<label for="mce-EMAIL">Sign up to our WordPress mailing list to receive news and updates about Inbound Now plugins</label>
				<input class="inputbg email" onfocus="if (this.value == 'Join Our Email List') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Join Our Email List';}" type="email" name="email" value="Join Our Email List">
				<input type="hidden" name="rurl" value="<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>">
				<input type="hidden" value="landing page plugin" name="MMERGE3">
				<div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
			</form>
			</div>

			<!--End mc_embed_signup-->
			<?php
				echo "</p></div>";
			}
		}
	}
	add_action( 'admin_init', 'lp_sub_nag_ignore' );
	function lp_sub_nag_ignore() {
		global $current_user;
		$user_id = $current_user->ID;
		/* If user clicks to ignore the notice, add that to their user meta */
		if ( isset( $_GET['example_nag_ignore'] ) && '0' == $_GET['example_nag_ignore'] ) {
			add_user_meta( $user_id, 'inbound_ignore_notice1', 'true', true );
		}
	}
	//end custom optin
}
?>
