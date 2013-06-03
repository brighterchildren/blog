<?php
/*
* Single Cause template file.
*/
get_header();

// Get paypal parameters
if (TESTENVIRONMENT === TRUE) {
	$paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
} else {
	$paypal_url = 'https://www.paypal.com/cgi-bin/webscr';
}
$paypal_email         = get_option('ch_paypal_email');
$paypal_thankyou      = get_option('ch_paypal_thankyou');
$paypallogo           = get_option('ch_paypallogo') ? get_option('ch_paypallogo') : '';
$paypal_currency_code = get_option('ch_paypal_currency_code');
$currency_sign        = get_option('ch_currency_sign') ? get_option('ch_currency_sign') : '$';

if ( !empty($_GET['amount']) ) {
	$amount = $_GET['amount'];
} else {
	$amount = '';
}

?>
<div class="white-bg">
	<div class="clearfix"></div>
		<div class="">
			<?php
			if (empty($paypal_email) || empty($paypal_thankyou)) {
				echo '
				<div class="page-title">';
				if ( !is_front_page() && !is_home() ) {
					echo ch_breadcrumbs();
				}
				echo '
					<h1>' . __( 'Missing configuration!', 'ch' ) . '</h1>
				</div>
				<div class="clearfix"></div>';

				echo '<p>' . __( 'Please configure Paypal settings on \'Theme Options\' page', 'ch') . '</p>';
			} elseif (have_posts ()) {
				echo '
				<div class="page-title">';
				if ( !is_front_page() && !is_home() ) {
					echo ch_breadcrumbs();
				}
				echo '
					' . the_title( '<h1>', '</h1>' ) . '
				</div>
				<div class="clearfix"></div>';

				$percents                      = 0;
				$how_many_donations_are_needed = (get_post_meta( get_the_id(), '_how_many_donations_are_needed', true )) ? get_post_meta( get_the_id(), '_how_many_donations_are_needed', true ) : 0;
				$current_fundrainers           = (get_post_meta( get_the_id(), '_fundraisers', true )) ? get_post_meta( get_the_id(), '_fundraisers', true ) : 0;
				$current_donations             = (get_post_meta( get_the_id(), '_donations_so_far', true )) ? get_post_meta( get_the_id(), '_donations_so_far', true ) : 0;
				$custom_paypal_email           = (get_post_meta( get_the_id(), '_custom_paypal_email', true )) ? get_post_meta( get_the_id(), '_custom_paypal_email', true ) : '';

				// If not empty cause specific paypal email then use it instead
				if ( !empty($custom_paypal_email) ) {
					$paypal_email = $custom_paypal_email;
				}
				
				if ( $how_many_donations_are_needed > 0 ) {
					$percents = number_format( ( $current_donations / $how_many_donations_are_needed ) * 100, 0 );
				}

				// Cause image
				$img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'staff-image');
			?>
				<div class="member-container entry-content row-fluid">
					<div class="member-image span10">
						<?php if ( !empty($img) ) echo '<img src="' . $img[0] . '" alt="" />'; ?>
					</div>
					<div class="member-text span13 pull-right">
						<?php the_content(); ?>
					</div>
					<div class="cause-wrapper">
						<div class="cause-content span13 pull-right no_left_margin">
							<div class="donation-container no_left_margin">
								<div class="donation-button">
									<form action="<?php echo $paypal_url; ?>" method="post">
										<input type="hidden" name="cmd" value="_donations">
										<input type="hidden" name="business" value="<?php echo $paypal_email; ?>">
										<input type="hidden" name="item_name" value="Donate to the <?php echo get_the_title(); ?> cause">
										<input type="hidden" name="no_shipping" value="0">
										<input type="hidden" name="no_note" value="1">
										<input type="hidden" name="currency_code" value="<?php echo $paypal_currency_code; ?>">
										<input type="hidden" name="return" value="<?php echo get_permalink( $paypal_thankyou ); ?>">
										<input type="hidden" name="notify_url" value="<?php echo home_url(); ?>">
										<input type="hidden" name="image_url" value="<?php echo $paypallogo; ?>">
										<input type="hidden" name="custom" value="<?php echo get_the_ID(); ?>">
										<div class="input-append">
											<input id="appendedPrependedDropdownButton" class="donate-input-text" name="amount" value="<?php echo $amount; ?>" type="text" placeholder="">
											<input type="submit" class="btn btn-primary" type="button" value="<?php _e('DONATE', 'ch'); ?>">
										</div>
									</form>
								</div>
								<div class="donated-so-far"><?php echo $currency_sign; ?><?php echo $current_donations; ?></div>
								<div class="donated-so-far-percents"><?php echo $percents; ?>%</div>
								<div class="clearfix"></div>
								<div class="progress">
									<div class="bar" style="width: <?php echo $percents; ?>%;"></div>
								</div>
								<div class="clearfix"></div>
								<div class="fundraisers"><?php echo $current_fundrainers; ?> <?php _e( 'fundraisers', 'ch' ); ?></div>
							</div>
						</div>
					</div>
				</div>

				<?php
			} else {
				echo '
					<h2>Nothing Found</h2>
					<p>Sorry, it appears there is no content in this section.</p>';
			}
			?>
		</div>
	<div class="clearfix"></div>
</div>
<?php $ch_is_in_sidebar = false; ?>
<?php get_footer();