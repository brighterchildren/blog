<?php

//***********DECLAR FUNCTIONS FOR INCREMENTING IMPRESSIONS AND CONVERSIONS******************/
function lp_get_page_views( $postID ) {
	$count_key = 'lp_page_views_count';
	$count = get_post_meta( $postID, $count_key, true );
	if ( $count=='' ) {
		delete_post_meta( $postID, $count_key );
		add_post_meta( $postID, $count_key, '0' );
		return;
	}
	return $count;
}

function lp_set_page_views( $postID ) {
	$count_key = 'lp_page_views_count';
	$count = get_post_meta( $postID, $count_key, true );
	if ( $count=='' ) {
		$count = 0;
		delete_post_meta( $postID, $count_key );
		add_post_meta( $postID, $count_key, '0' );
	}else {
		$count++;
		update_post_meta( $postID, $count_key, $count );
	}
}

function lp_get_conversions( $postID ) {
	$count_key = 'lp_page_conversions_count';
	$count = get_post_meta( $postID, $count_key, true );
	if ( $count=='' ) {
		delete_post_meta( $postID, $count_key );
		add_post_meta( $postID, $count_key, '0' );
		return "0";
	}
	return $count;
}


function lp_set_conversions( $postID ) {
	$count_key = 'lp_page_conversions_count';
	$count = get_post_meta( $postID, $count_key, true );
	//mail('hudson.atwell@gmail.com','hello',$count);
	if ( $count=='' ) {
		$count = 0;
		delete_post_meta( $postID, $count_key );
		add_post_meta( $postID, $count_key, '0' );
	}else {
		$count++;
		update_post_meta( $postID, $count_key, $count );
	}
}


//***********FUNCTION THAT WILL FIND POST ID FROM URL FOR CUSTOM POST TYPES******************/
function lp_url_to_postid( $url ) {
	global $wpdb;
	$parsed = parse_url( $url );
	$url = $parsed['path'];

	$parts = explode( '/', $url );

	$count = count( $parts );
	$count = $count -1;

	if ( empty( $parts[$count] ) ) {
		$i = $count-1;
		$slug = $parts[$i];
	}
	else {
		$slug = $parts[$count];
	}
	//echo $slug;
	$my_id = $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE post_name = '$slug' AND post_type='landing-page'" );

	if ( $my_id ) {
		return $my_id;
	}
	else {
		return 0;
	}
}

function lp_get_useragent_whitelist() {
	$useragent[] = 'msie';
	$useragent[] = 'firefox';
	$useragent[] = 'webkit';
	$useragent[] = 'opera';
	$useragent[] = 'netscape';
	$useragent[] = 'konqueror';
	$useragent[] = 'gecko';
	$useragent[] = 'chrome';
	$useragent[] = 'songbird';
	$useragent[] = 'seamonkey';
	$useragent[] = 'flock';
	$useragent[] = 'AppleWebKit';
	$useragent[] = 'Android';
	$useragent[] = 'Lynx';
	$useragent[] = 'Dillo';

	return $useragent;
}

function lp_determine_spider() {
	if ( isset( $_SERVER['HTTP_USER_AGENT'] ) ) {
		$visitor_useragent = strtolower( $_SERVER['HTTP_USER_AGENT'] );
		$visitor_ip = $_SERVER['REMOTE_ADDR'];
	}
	else {
		return 1;
	}


	//check to make sure useragent is present
	if ( $visitor_useragent ) {
		$useragents = lp_get_useragent_whitelist();
		foreach ( $useragents as $k=>$v ) {
			$v = trim( $v );
			if ( $v ) {
				if ( stristr( $visitor_useragent, $v )||$v=='*' ) {
					return 0;
				}
			}
		}
	}

	return 1;
}

?>
