<?php

if ( is_admin() ) {
	include_once LANDINGPAGES_PATH.'filters/filters.split-testing.php';


	add_action( 'admin_enqueue_scripts', 'lp_st_admin_enqueue' );
	function lp_st_admin_enqueue() {
		if ( isset( $_GET['page'] )&&$_GET['page']=='lp_split_testing' ) {
			wp_enqueue_style( 'lp-css-split-testing', LANDINGPAGES_URLPATH . 'css/admin-split-testing.css' );
			wp_enqueue_script( 'jquery-tablesorter', LANDINGPAGES_URLPATH . 'js/jquery.tablesorter.js' );
			wp_enqueue_script( 'lp-js-splittesting', LANDINGPAGES_URLPATH . 'js/admin.split-testing.js' );
		}
	}
}


function lp_split_testing_display() {
	global $user_ID;
	$admin_url = get_admin_url();
	$default_group_id = 'new';
	$default_group_name = ' ';
	$default_landing_page_ids = array();
	$active_tab = 'manage';


	$args=array(
		'post_type' => 'landing-page',
		'post_status' => 'publish,pending',
		'posts_per_page' => -1
	);

	if ( isset( $_REQUEST['edit_group'] ) ) {
		$active_tab = 'edit';
		$default_group_name = $_REQUEST['group_name'];
		$default_group_id = $_REQUEST['group_id'];
		if ( isset( $_REQUEST['lp_data'] ) ) {
			$lp_data =  stripslashes( $_REQUEST['lp_data'] );
			$lp_data = json_decode( $lp_data, true );

			foreach ( $lp_data as $lp_id=>$data ) {
				$default_landing_page_ids[] = $lp_id;
			}
		}
		else {
			$default_landing_page_ids = explode( ',', $_REQUEST['landing_page_ids'] );
		}
	}

	if ( isset( $_REQUEST['create_group'] ) ) {
		if ( !isset( $_REQUEST['landing_page_ids'] ) ) {
			echo '<div class="updated">
					<p>Please select landing pages to create a split testing group.</p>
				</div>';
		}

		if ( $_REQUEST['group_id']=='new'&&isset( $_REQUEST['landing_page_ids'] ) ) {
			$name = $_REQUEST['group_name'];
			$landing_page_ids =  $_REQUEST['landing_page_ids'];

			foreach ( $landing_page_ids as $key=>$lp_id ) {
				$data[$lp_id]['id'] = $lp_id;
				$data[$lp_id]['status'] = 'active';
			}

			$data = json_encode( $data );

			$new_post = array(
				'post_title' => $name,
				'post_content' => $data,
				'post_status' => 'publish',
				'post_date' => date( 'Y-m-d H:i:s' ),
				'post_author' => $user_ID,
				'post_type' => 'landing-page-group'
			);

			$post_id = wp_insert_post( $new_post );
		}
		else {

			$content = get_post_field( 'post_content', $_REQUEST['group_id'] );
			$old_data = json_decode( $content, true );

			if ( isset( $_REQUEST['landing_page_ids'] ) ) {
				$landing_page_ids =  $_REQUEST['landing_page_ids'];
				//print_r($landing_page_ids);exit;
				//echo ($landing_page_ids);exit;
				foreach ( $landing_page_ids as $key=>$lp_id ) {
					$data[$lp_id]['id'] = $lp_id;
					if ( isset( $old_data[$lp_id]['status'] ) ) {
						$data[$lp_id]['status'] = $old_data[$lp_id]['status'];
					}
					else {
						$data[$lp_id]['status'] = 'active';
					}
				}

				$data = json_encode( $data );

				$new_post = array(
					'ID' => $_REQUEST['group_id'],
					'post_title' => $_REQUEST['group_name'],
					'post_content' => $data,
					'post_status' => 'publish',
					'post_date' => date( 'Y-m-d H:i:s' ),
					'post_author' => $user_ID,
					'post_type' => 'landing-page-group'
				);
				//print_r($new_post);
				$post_id = wp_update_post( $new_post );
				//echo $post_id;
			}
		}
		//echo $post_id;exit;
	}

	if ( isset( $_REQUEST['reset_group'] ) ) {
		$post_data = json_decode( stripslashes( $_POST['lp_data'] ), true );
		foreach ( $post_data as $key => $data ) {
			update_post_meta( $key, 'lp_page_views_count', 0 );
			update_post_meta( $key, 'lp_page_conversions_count', 0 );
		}
	}

	if ( isset( $_REQUEST['delete_group'] ) ) {
		wp_delete_post( $_REQUEST['group_id'], true );
	}

?>

	<div id='poststuff'>

		<?php
	//$args = lp_get_split_test_tabs();
?>
		<h2 class="nav-tab-wrapper">
			<a  id='tabs-manage' class="nav-tab-special<?php echo $active_tab == 'manage' ? '-active' : '-inactive'; ?>">Manage Split Tests</a>
			<a  id='tabs-edit' class="nav-tab-special<?php echo $active_tab == 'edit' ? '-active' : '-inactive'; ?>">Create New Split Test</a>
		</h2>

		<div id='lp-st-manage' <?php echo $active_tab == 'manage' ? 'class="lp-open"' : 'class="lp-closed"'; ?>>
			<?php
	global $table_prefix;
	$query = "SELECT * FROM {$table_prefix}posts WHERE post_type='landing-page-group' ORDER BY ID DESC";
	$result = mysql_query( $query );
	$i=0;
	while ( $arr=mysql_fetch_array( $result ) ) {
		$group_id = $arr['ID'];
		$group_permalink = get_permalink( $group_id );
		$group_name = $arr['post_title'];
		$lp_data = $arr['post_content'];
		$landing_page_ids = json_decode( $lp_data, true );
		$landing_page_ids = array_filter( $landing_page_ids );
		//unset($landing_page_ids['']);
		//print_r($landing_page_ids);exit;
		//$group_status = explode(',',$arr['post_status']);
		//echo $group_id;
?>

				<div id="lp_3_custom_css" class="postbox ">
					<div class="handlediv" title="Click to toggle"><br></div><h3 class="hndle"><span><?php echo $group_name; ?></span></h3>
					<div class="inside" style='background-color:#fff;'>
						<small><strong>Permalink</strong>: <em><a href='<?php echo $group_permalink; ?>' target='_blank'><?php echo $group_permalink; ?></a></em></small>	<br><br>
						<div class='lp-st-container'>
							<table class='lp-st-table' cellspacing='4'>
								<thead>
								<tr>
									<th >
									lander name
									</th>
									<th>
									impressions
									</th>
									<th>
									conversions
									</th>
									<th>
									conversion rate
									</th>
									<th>
									bounces
									</th>
									<th>
									bounce rate
									</th>
									<th>
									performance
									</th>
									<th>
									actions
									</th>
								</tr>
								</thead>
							<?php
		foreach ( $landing_page_ids as $data ) {
			$this_id = $data['id'];
			if ( !$this_id ) continue;
			$this_status = $data['status'];
			$impressions = lp_get_page_views( $this_id );
			if ( $impressions!=0 ) {
				$conversions = lp_get_conversions( $this_id );
				$conversions = lp_st_conversions_callback( array( 'id'=>$this_id, 'content'=>$conversions ), true );
				$conversion_rate =  $conversions / $impressions ;
				$conversion_rate = lp_st_conversion_rate_callback( array( 'id'=>$this_id, 'content'=>$conversion_rate ), true );

				$bounces = $impressions - $conversions;
				$bounce_rate =  $bounces / $impressions ;
				$bounce_rate = lp_st_bounce_rate_callback( array( 'id'=>$this_id, 'content'=>$bounce_rate ), true );
			}
			else {
				$bounces = 0;
				$conversions = 0;
				$conversion_rate = ".0";
				$bounce_rate = "1";
			}

			$lp_title = get_the_title( $this_id );
			$lp_permalink = get_permalink( $this_id );
?>
										<tr>
											<td>
												<?php lp_st_title_callback( array( 'id'=>$this_id, 'content'=>$lp_title ) ); ?>
												<?php lp_st_after_title_callback( array( 'id'=>$this_id ) ); ?>
											</td>
											<td>
												<?php lp_st_impressions_callback( array( 'id'=>$this_id, 'content'=>$impressions ) ); ?>
												<?php lp_st_after_impressions_callback( array( 'id'=>$this_id ) ); ?>
											</td>
											<td>
												<?php lp_st_conversions_callback( array( 'id'=>$this_id, 'content'=>$conversions ) ); ?>
												<?php lp_st_after_conversions_callback( array( 'id'=>$this_id ) ); ?>
											</td>
											<td>
												<?php
			lp_make_percent( $conversion_rate ); ?>
												<?php lp_st_after_conversion_rate_callback( array( 'id'=>$this_id ) ); ?>
											</td>
											<td>
												<?php lp_st_bounces_callback( array( 'id'=>$this_id, 'content'=>$bounces ) ); ?>
												<?php lp_st_after_bounces_callback( array( 'id'=>$this_id ) ); ?>
											</td>
											<td>
												<?php lp_make_percent( $bounce_rate ); ?>
												<?php lp_st_after_bounce_rate_callback( array( 'id'=>$this_id ) ); ?>
											</td>
											<td id='td_performance'>
												<span style='display:none;'><?php echo $conversion_rate; ?></span>
												<center>
												<?php
			$green = $conversion_rate * 150;
			$grey = $bounce_rate * 150;
			if ( $green==0 ) {$green=1;$grey = $grey - 2;$black=1;}
			else {$grey = $grey - 1;$black=1;}
?>
												<div style='width:<?php echo $green;?>px;border-bottom: 7px solid #85A64C;float:left' title='<?php echo $conversions_percent; ?>% Converted'></div>
												<div style='width:<?php echo $black;?>px;border-bottom: 7px solid #000000;float:left;' title='<?php echo $conversions_percent; ?>%'></div>
												<div style='width:<?php echo $grey;?>px;border-bottom: 7px solid #D6D6D6;float:left;' title='<?php echo $bounces_percent; ?>% Bounced'></div>
												</center>
											</td>
											<td>


											<a class='pause_lander <?php echo "pause_".$group_id."_".$this_id; ?> <?php if ( $this_status=='active' ) { echo 'active lp_toggle_pause'; }else {echo "inactive";}?>' rel='<?php echo $group_id; ?>' id='lp_pause_<?php echo $this_id; ?>' title='Pause Lander'>[pause]</a> &nbsp;
											<a class='play_lander  <?php echo "play_".$group_id."_".$this_id; ?> <?php if ( $this_status=='paused' ) { echo 'active lp_toggle_play'; }else {echo "inactive";}?>'  rel='<?php echo $group_id; ?>' id='lp_play_<?php echo $this_id; ?>'  title='Play Lander'>[play]</a> &nbsp;

											<a class='clear_stats' id='lp_clear_<?php echo $this_id;?>'>[clear stats]</a> &nbsp;
											<a class='view_lander  active' href='<?php echo $lp_permalink; ?>' rel='<?php echo $group_id; ?>' id='lp_view_<?php echo $this_id; ?>'  target='_blank' title='View Landing Page'>[view]</a> &nbsp;

											</td>
										</tr>

								<?php

			$i++;
		}

?>
							</table>
						</div>
						<br><br>
						<br>

						<div style='float:right'>
							<form method='post' action="edit.php?post_type=landing-page&page=lp_split_testing">
							<input type='hidden' name='group_id' value='<?php echo $group_id; ?>'>
							<input type='hidden' name='group_name' value='<?php echo $group_name; ?>'>
							<input type='hidden' name='lp_data' value='<?php echo $lp_data; ?>'>
							<input name="edit_group" type="submit" class="button-secondary" id="publish" tabindex="5" value="Edit this Group">
							</form>
						</div>
						<div style='float:right'>
							<form method='post' action="edit.php?post_type=landing-page&page=lp_split_testing">
							<input type='hidden' name='group_id' value='<?php echo $group_id; ?>'>
							<input type='hidden' name='lp_data' value='<?php echo $lp_data; ?>'>
							<input name="reset_group" type="submit" class="button-secondary" id="publish" tabindex="5" value="Reset stats for all items in group"  onClick="return confirm( 'Are you sure you want to delete the stats for each landing page in this group?');">
							</form>
						</div>
						<div style='float:right'>
							<form method='post' action="edit.php?post_type=landing-page&page=lp_split_testing">
							<input type='hidden' name='group_id' value='<?php echo $group_id; ?>'>
							<input name="delete_group" type="submit" class="button-secondary" id="publish" tabindex="5" value="Delete this group." onClick="return confirm( 'Are you sure you want to delete this group?');">
							</form>
						</div>
						<br><br>
					</div>
				</div>
				<?php
	}

?>
		</div>
		<div id="lp-st-edit" class="postbox <?php echo $active_tab == 'edit' ? 'lp-open' : 'lp-closed'; ?>">
			<form action="edit.php?post_type=landing-page&page=lp_split_testing" method='post'>
			<input type='hidden' name='group_id' value='<?php echo $default_group_id; ?>'>
			<div class="handlediv" title="Click to toggle"><br></div><h3 class="hndle"><span>Create a new split testing group!</span></h3>
				<div class="inside">
					<table class="form-table">
						<tbody>
							<tr>
								<th style='cursor:pointer' title='We will use this name to generate a custom permalink'>Group Name</th>
								<td align='left'>
									<input type='text' name='group_name' size=35 value='<?php echo $default_group_name; ?>'>
								</td>
							</tr>
							<tr>
								<th><label for="lp_record_admin_actions" title='We rotate between these selected landing pages.'>Group Landing Pages</label></th>
								<td valign='top'>
									<?php
	$args=array(
		'post_type' => 'landing-page',
		'post_status' => 'publish,pending',
		'posts_per_page' => -1
	);
	$my_query = null;
	$my_query = new WP_Query( $args );
	if ( $my_query->have_posts() ) {
		$i=1;
		while ( $my_query->have_posts() ) : $my_query->the_post();
?>
											<span style='float:left;padding:10px;'>
											<input type='checkbox' name='landing_page_ids[]' value= '<?php the_ID(); ?>'  <?php if ( in_array( get_the_ID(), $default_landing_page_ids ) ) { echo "checked"; } ?>> &nbsp; <a href='<?php the_permalink(); ?>' target='_blank' title='Preview this landing page'><?php the_title(); ?></a>
											</span>
										<?php
		$i++;
		endwhile;
	}
	else {
		echo "<center><a href='$admin_url/post-new.php?post_type=landing-page'>Create your first landing page</a></center>";
	}

?>
								</td>
							</tr>
							<tr>
								<th></th>
								<td>
									<div style='float:right'>
										<input name="create_group" type="submit" class="button-primary" id="lp-button-create-new-group-open" tabindex="5" value="Save Group">
									</div>
								</td>
							</tr>
						</tbody>
					</table>

				</div>

			</form>
		</div>
	</div>
	<?php

}



?>
