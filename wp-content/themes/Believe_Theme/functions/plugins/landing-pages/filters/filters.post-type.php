<?php

function lp_col_impressions_callback( $args , $return = false ) {
	if ( !isset( $args['content'] ) ) { $args['content'] = ""; }
	$args = apply_filters( 'lp_col_impressions', $args );
	if ( $return ) { return $args['content']; } else { echo $args['content']; }
}

function lp_col_conversions_callback( $args , $return = false ) {
	if ( !isset( $args['content'] ) ) { $args['content'] = ""; }
	$args = apply_filters( 'lp_col_conversions', $args );
	if ( $return ) { return $args['content']; } else { echo $args['content']; }
}

function lp_col_conversion_rate_callback( $args , $return = false ) {
	if ( !isset( $args['content'] ) ) { $args['content'] = ""; }
	$args = apply_filters( 'lp_col_conversion_rate', $args );
	if ( $return ) { return $args['content']; } else { echo $args['content']; }
}



?>
