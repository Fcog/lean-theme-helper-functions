<?php

/**
 * Returns the years in the given order on which the posts have been written.
 *
 * @param string $post_type Name of the post type.
 */
function lean_get_posts_years( $post_type = 'post', $order = 'desc' ) {
	$years_string = wp_get_archives([
		'type' => 'yearly',
		'format' => 'custom',
		'post_type' => $post_type,
		'echo' => false,
	]);
	// Just search for digits inside >2015< (example).
	$re = '/>(\d+)</';
	preg_match_all( $re, $years_string, $matches );
	$matches = (array) $matches;
	$years = empty( $matches[1] ) ? [] : $matches[1];

	if ( ! is_array( $years ) ) {
		return [];
	}

	if ( $order === 'desc' ) {
		rsort( $years, SORT_NUMERIC );
	} else {
		sort( $years, SORT_NUMERIC );
	}

	return $years;
}
