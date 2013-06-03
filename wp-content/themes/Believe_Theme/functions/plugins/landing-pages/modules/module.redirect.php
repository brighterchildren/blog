<?php

define( "QUICK_CACHE_ALLOWED", false );
define( "DONOTCACHEPAGE", true );
define( 'DONOTCACHCEOBJECT', true );
define( 'DONOTCDN', true );

include './../../../../wp-config.php';
$debug = 1;
$debug = apply_filters( 'lp_st_session_check', $debug );

if ( session_id()=="" ) {
	// session isn't started
	//session_start();
}

//echo $_SESSION[$_GET['permalink_name']];
if ( isset( $_SESSION[$_GET['permalink_name']] ) && !$debug ) {
	$url = $_SESSION[$_GET['permalink_name']];
}
else {
	$query = "SELECT * FROM {$table_prefix}posts WHERE post_name='".$_GET['permalink_name']."' AND post_type='landing-page-group' LIMIT 1";
	$result = mysql_query( $query );
	if ( !$result ) { echo $query; echo mysql_error(); exit;}

	//echo mysql_num_rows($result);

	$arr = mysql_fetch_array( $result );
	$pid = $arr['ID'];
	$data = json_decode( $arr['post_content'], true );
	foreach ( $data as $key=>$val ) {
		if ( $data[$key]['status']=='paused' ) {

			unset( $data[$key] );
		}
	}

	$data_keys = array_keys( $data );

	$meta_id = 'group_marker';
	$old_key = get_post_meta( $pid, $meta_id, true );

	foreach ( $data as $key=> $val ) {
		if ( $data[$key]['status']=='paused' ) {
			unset( $data[$key] );
		}
	}

	if ( $old_key =='' ) {
		//echo here;
		//echo "<br>";
		$value = 0;
		delete_post_meta( $pid, $meta_id );
		add_post_meta( $pid, $meta_id, $value );

		$lp_id = $data[$data_keys[0]]['id'];

	}
	else {
		$count = count( $data_keys );
		$this_key = $old_key+1;
		if ( $this_key>=$count ) {
			$next_key = 0;
		}
		else {
			$next_key = $old_key+1;
		}

		update_post_meta( $pid, $meta_id, $next_key );
		$lp_id = $data[$data_keys[$next_key]]['id'];
	}

	$url = get_permalink( $lp_id );
	$_SESSION[$_GET['permalink_name']] = $url;
}

//echo $url;exit;
$page = lp_remote_connect( $url );
echo $page;
//header("HTTP/1.1 307 Temporary Redirect");
//header("Location: $url");



////////////////////////////////////////////////////////////

function lp_get_next( $array, $key ) {
	$currentKey = key( $array );
	while ( $currentKey !== null && $currentKey != $key ) {
		next( $array );
		$currentKey = key( $array );
	}
	return next( $array );
}

function lp_remote_connect( $url ) {
	$visitor_useragent = strtolower( $_SERVER['HTTP_USER_AGENT'] );
	$visitor_ip = $_SERVER['REMOTE_ADDR'];

	$method1 = ini_get( 'allow_url_fopen' ) ? "Enabled" : "Disabled";

	if ( $method1 == 'Disabled' ) {
		//do curl
		$ch = curl_init();
		curl_setopt ( $ch, CURLOPT_URL, $url."?ua=$visitor_useragent" );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt ( $ch, CURLOPT_FOLLOWLOCATION, 1 );
		curl_setopt ( $ch, CURLOPT_USERAGENT, $visitor_useragent );
		curl_setopt ( $ch, CURLOPT_COOKIEJAR, 'cookie.txt' );
		curl_setopt ( $ch, CURLOPT_COOKIEFILE, 'cookie.txt' );
		curl_setopt ( $ch, CURLOPT_TIMEOUT, 60 );
		$string = curl_exec( $ch );
	}
	else {
		$string = file_get_contents( $url );
	}

	return $string;
}
?>
