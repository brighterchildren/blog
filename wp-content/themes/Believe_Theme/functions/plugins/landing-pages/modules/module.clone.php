<?php
add_filter( 'post_row_actions', 'lp_add_links', 10, 2 );
add_action( 'admin_action_lp_duplicate_post_save_pending', 'lp_duplicate_post_save_pending' );


function lp_add_links( $actions, $post ) {
	$actions['clone'] = '<a href="'.lp_duplicate_post_get_clone_post_link( $post->ID , 'display', false ).'" title="'
		. esc_attr( __( "Clone this item", 'lp_duplicate_post' ) )
		. '">' .  __( 'Clone', 'lp_duplicate_post' ) . '</a>';

	return $actions;
}

function lp_duplicate_post_get_clone_post_link( $id = 0, $context = 'display', $draft = true ) {

	if ( !$post = &get_post( $id ) )
		return;

	$action_name = "lp_duplicate_post_save_pending";

	if ( 'display' == $context )
		$action = '?action='.$action_name.'&amp;post='.$post->ID;
	else
		$action = '?action='.$action_name.'&post='.$post->ID;

	$post_type_object = get_post_type_object( $post->post_type );
	if ( !$post_type_object )
		return;

	return apply_filters( 'lp_duplicate_post_get_clone_post_link', admin_url( "admin.php". $action ), $post->ID, $context );
}

function lp_duplicate_post_save_pending() {
	lp_duplicate_post_save_as_new_post( 'pending' );
}

function lp_duplicate_post_save_as_new_post( $status = '' ) {

	// Get the original post
	$id = ( isset( $_GET['post'] ) ? $_GET['post'] : $_POST['post'] );
	$post = get_post( $id );

	// Copy the post and insert it
	if ( isset( $post ) && $post!=null ) {
		$new_id = lp_duplicate_post_create_duplicate( $post, $status );

		if ( $status == '' ) {
			// Redirect to the post list screen
			wp_redirect( admin_url( 'edit.php?post_type='.$post->post_type ) );
		} else {
			// Redirect to the edit screen for the new draft post
			wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_id ) );
		}
		exit;

	} else {
		$post_type_obj = get_post_type_object( $post->post_type );
		wp_die( esc_attr( __( 'Copy creation failed, could not find original:', DUPLICATE_POST_I18N_DOMAIN ) ) . ' ' . $id );
	}
}

function lp_duplicate_post_create_duplicate( $post, $status = '', $parent_id = '', $blank = false ) {
	//echo 1; exit;
	$prefix = "";
	$suffix = "";

	if ( !is_object( $post )&&is_numeric( $post ) ) {
		$post = get_post( $post );
	}

	$status = $post->post_status;
	// We don't want to clone revisions
	if ( $post->post_type == 'revision' ) return;

	if ( $post->post_type != 'attachment' ) {
		$prefix = "Copy of ";
		$suffix = "";
		$status = 'pending';
	}
	$new_post_author = lp_duplicate_post_get_current_user();

	if ( $blank==false ) {
		$new_post = array(
			'menu_order' => $post->menu_order,
			'comment_status' => $post->comment_status,
			'ping_status' => $post->ping_status,
			'post_author' => $new_post_author->ID,
			'post_content' => $post->post_content,
			'post_excerpt' =>  $post->post_excerpt ,
			'post_mime_type' => $post->post_mime_type,
			'post_parent' => $new_post_parent = empty( $parent_id )? $post->post_parent : $parent_id,
			'post_password' => $post->post_password,
			'post_status' => $status,
			'post_title' => $prefix.$post->post_title.$suffix,
			'post_type' => $post->post_type,
		);

		$new_post['post_date'] = $new_post_date =  $post->post_date ;
		$new_post['post_date_gmt'] = get_gmt_from_date( $new_post_date );
	}
	else {
		$new_post = array(
			'menu_order' => $post->menu_order,
			'comment_status' => $post->comment_status,
			'ping_status' => $post->ping_status,
			'post_author' => $new_post_author->ID,
			'post_content' => "",
			'post_excerpt' =>  "" ,
			'post_mime_type' => $post->post_mime_type,
			'post_status' => $status,
			'post_title' => "New Blank Landing Page",
			'post_type' => $post->post_type,
			'post_date' => date( 'Y-m-d H:i:s' )
		);


	}

	$new_post_id = wp_insert_post( $new_post );

	$meta_data = lp_get_post_meta_all( $post->ID );
	foreach ( $meta_data as $key=>$value ) {
		update_post_meta( $new_post_id, $key, $value );
	}

	return $new_post_id;
}

function lp_clone_st_groups( $old_id, $clone_id, $group_ids=null ) {
	$args=array(
		'post_type' => 'landing-page-group',
		'post_satus'=>'publish'
	);

	$my_query = null;
	$my_query = new WP_Query( $args );

	if ( $my_query->have_posts() ) {
		$i=1;
		while ( $my_query->have_posts() ) : $my_query->the_post();
		$group_id = get_the_ID();

		if ( isset( $group_ids ) ) {
			if ( !in_array( $group_id, $group_ids ) ) {
				continue;
			}
		}


		$group_data = get_the_content();
		$group_data = json_decode( $group_data, true );

		$lp_ids = array();
		foreach ( $group_data as $key=>$value ) {
			$lp_ids[] = $key;
		}

		//echo "$group_id: $old_id : $clone_id<br>";
		$group_data[$clone_id]['id'] = $clone_id;
		$group_data[$clone_id]['status'] = 'active';
		$this_data = json_encode( $group_data );
		//print_r($this_data);

		$new_post = array(
			'ID' => $group_id,
			'post_title' => get_the_title(),
			'post_content' => $this_data,
			'post_status' => 'publish',
			'post_date' => date( 'Y-m-d H:i:s' ),
			'post_author' => 1,
			'post_type' => 'landing-page-group'
		);

		$post_id = wp_update_post( $new_post );

		endwhile;
	}
}

function lp_duplicate_post_get_current_user() {
	if ( function_exists( 'wp_get_current_user' ) ) {
		return wp_get_current_user();
	} else if ( function_exists( 'get_currentuserinfo' ) ) {
			global $userdata;
			get_currentuserinfo();
			return $userdata;
		} else {
		$user_login = $_COOKIE[USER_COOKIE];
		$current_user = $wpdb->get_results( "SELECT * FROM $wpdb->users WHERE user_login='$user_login'" );
		return $current_user;
	}
}

function lp_get_post_meta_all( $post_id ) {
	global $wpdb;
	$data   =   array();
	$wpdb->query( "
			SELECT `meta_key`, `meta_value`
			FROM $wpdb->postmeta
			WHERE `post_id` = $post_id
		" );
	foreach ( $wpdb->last_result as $k => $v ) {
		$data[$v->meta_key] =   $v->meta_value;
	};
	return $data;
}

// Using our action hooks to copy taxonomies
add_action( 'lp_duplicate_post', 'lp_duplicate_post_copy_post_taxonomies', 10, 2 );
function lp_duplicate_post_copy_post_taxonomies( $new_id, $post ) {
	global $wpdb;
	if ( isset( $wpdb->terms ) ) {
		// Clear default category (added by wp_insert_post)
		wp_set_object_terms( $new_id, NULL, 'category' );

		$post_taxonomies = get_object_taxonomies( $post->post_type );
		$taxonomies_blacklist = array();
		$taxonomies = array_diff( $post_taxonomies, $taxonomies_blacklist );
		foreach ( $taxonomies as $taxonomy ) {
			$post_terms = wp_get_object_terms( $post->ID, $taxonomy, array( 'orderby' => 'term_order' ) );
			$terms = array();
			for ( $i=0; $i<count( $post_terms ); $i++ ) {
				$terms[] = $post_terms[$i]->slug;
			}
			wp_set_object_terms( $new_id, $terms, $taxonomy );
		}
	}
}

// Using our action hooks to copy meta fields
add_action( 'lp_duplicate_post', 'lp_duplicate_post_copy_post_meta_info', 10, 2 );
function lp_duplicate_post_copy_post_meta_info( $new_id, $post ) {
	$post_meta_keys = get_post_custom_keys( $post->ID );
	if ( empty( $post_meta_keys ) ) return;

	foreach ( $post_meta_keys as $meta_key ) {
		$meta_values = get_post_custom_values( $meta_key, $post->ID );
		foreach ( $meta_values as $meta_value ) {
			$meta_value = maybe_unserialize( $meta_value );
			add_post_meta( $new_id, $meta_key, $meta_value );
		}
	}
}

/**
 * Copy the attachments
 * It simply copies the table entries, actual file won't be duplicated
 */
add_action( 'lp_duplicate_post', 'lp_duplicate_post_copy_children', 10, 2 );
function lp_duplicate_post_copy_children( $new_id, $post ) {

	// get children
	$children = get_posts( array( 'post_type' => 'any', 'numberposts' => -1, 'post_status' => 'any', 'post_parent' => $post->ID ) );
	// clone old attachments
	foreach ( $children as $child ) {
		lp_duplicate_post_create_duplicate( $child, '', $new_id );
	}
}
// Using our action hooks to copy attachments

?>
