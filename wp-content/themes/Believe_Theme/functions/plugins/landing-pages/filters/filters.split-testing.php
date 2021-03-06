<?php


function lp_st_title_callback( $args , $return = false ) {
	//echo $args['content'];exit;
	if ( !isset( $args['content'] ) ) { $args['content'] = ""; }
	$args = apply_filters( 'lp_st_title', $args );
	$args['content'] = str_replace( '&#8217;', "'", $args['content'] );
	if ( $return ) { return $args['content']; } else { echo $args['content']; }
}


function lp_st_after_title_callback( $args , $return = false ) {
	if ( !isset( $args['content'] ) ) { $args['content'] = ""; }
	$args = apply_filters( 'lp_st_after_title', $args );
	if ( $return ) { return $args['content']; } else { echo $args['content']; }
}

function lp_st_impressions_callback( $args , $return = false ) {
	if ( !isset( $args['content'] ) ) { $args['content'] = ""; }
	$args = apply_filters( 'lp_st_impressions', $args );
	if ( $return ) { return $args['content']; } else { echo $args['content']; }
}

function lp_st_after_impressions_callback( $args , $return = false ) {
	if ( !isset( $args['content'] ) ) { $args['content'] = ""; }
	$args = apply_filters( 'lp_st_after_impressions', $args );
	if ( $return ) { return $args['content']; } else { echo $args['content']; }
}

function lp_st_conversions_callback( $args , $return = false ) {
	if ( !isset( $args['content'] ) ) { $args['content'] = ""; }
	$args = apply_filters( 'lp_st_conversions', $args );
	if ( $return ) { return $args['content']; } else { echo $args['content']; }
}

function lp_st_after_conversions_callback( $args , $return = false ) {
	if ( !isset( $args['content'] ) ) { $args['content'] = ""; }
	$args = apply_filters( 'lp_st_after_conversions', $args );
	if ( $return ) { return $args['content']; } else { echo $args['content']; }
}

function lp_st_conversion_rate_callback( $args , $return = false ) {
	if ( !isset( $args['content'] ) ) { $args['content'] = ""; }
	$args = apply_filters( 'lp_st_conversion_rate', $args );
	if ( $return ) { return $args['content']; } else { echo $args['content']; }
}

function lp_st_after_conversion_rate_callback( $args , $return = false ) {
	if ( !isset( $args['content'] ) ) { $args['content'] = ""; }
	$args = apply_filters( 'lp_st_after_conversion_rate', $args );
	if ( $return ) { return $args['content']; } else { echo $args['content']; }
}

function lp_st_bounces_callback( $args , $return = false ) {
	if ( !isset( $args['content'] ) ) { $args['content'] = ""; }
	$args = apply_filters( 'lp_st_bounces', $args );
	if ( $return ) { return $args['content']; } else { echo $args['content']; }
}

function lp_st_after_bounces_callback( $args , $return = false ) {
	if ( !isset( $args['content'] ) ) { $args['content'] = ""; }
	$args = apply_filters( 'lp_st_after_bounces', $args );
	if ( $return ) { return $args['content']; } else { echo $args['content']; }
}

function lp_st_bounce_rate_callback( $args , $return = false ) {
	if ( !isset( $args['content'] ) ) { $args['content'] = ""; }
	$args = apply_filters( 'lp_st_bounce_rate', $args );
	if ( $return ) { return $args['content']; } else { echo $args['content']; }
}

function lp_st_after_bounce_rate_callback( $args , $return = false ) {
	if ( !isset( $args['content'] ) ) { $args['content'] = ""; }
	$args = apply_filters( 'lp_st_after_bounce_rate', $args );
	if ( $return ) { return $args['content']; } else { echo $args['content']; }
}


?>
