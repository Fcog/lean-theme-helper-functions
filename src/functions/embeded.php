<?php

/**
 * Function to convert any Youtube video URL to the embeded format code.
 *
 * @param string $youtube_url The original URL.
 * @param string $params A single string with additional parameters for the iframe.
 * @return string Embed format URL.
 */
function lean_convert_youtube_url_to_embeded( $youtube_url, $params = '' ) {
	$iframe = '<iframe src="//www.youtube.com/embed/$2" ' . $params . ' allowfullscreen></iframe>';
	return preg_replace(
		'/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i',
		$iframe,
		$youtube_url
	);
}

/**
 * Transform a normal youtube/vimeo url into a embeddable URL.
 *
 * @param string $url Url of the video.
 * @return string New URL
 */
function lean_get_video_embed_url( $url = '' ) {
	if ( strpos( $url, 'youtube' ) !== false && strpos( $url, 'watch' ) !== false ) {
		$parts = wp_parse_url( $url );
		if ( is_array( $parts ) && isset( $parts['query'] ) ) {
			parse_str( $parts['query'] );
			if ( isset( $v ) ) {
				$url = 'https://www.youtube.com/embed/' . $v;
			}
		}
	} else if ( strpos( $url, 'vimeo' ) !== false && strpos( $url, 'player' ) === false ) {
		$parts = wp_parse_url( $url );
		if ( is_array( $parts ) && isset( $parts['path'] ) ) {
			$url = 'https://player.vimeo.com/video' . $parts['path'];
		}
	}
	return $url;
}
