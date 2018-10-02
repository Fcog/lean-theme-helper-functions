<?php
/**
 * Get the source path of an image based on the ID of the image.
 *
 * @param int    $image_id ID of the attachment.
 * @param string $size The name of the size to be loaded.
 * @return string the image or empty string if no image of the given size is found.
 */
function lean_get_image( $image_id, $size = 'full' ) {
	$data = wp_get_attachment_image_src( $image_id, $size );
	return empty( $data ) ? '' : $data[0];
}

/**
 * Get the source path of an image in 1x and 2x versions based on the image ID.
 *
 * @param string $image_id the image ID (an attachment ID).
 * @param string $image_size The 1x image size to be loaded.
 * @param string $retina_image_size The 2x image size to be loaded.
 * @return array Returns 2 array elements, the first one containing the 1x image url and the 2nd
 * containing the retina image url.
 */
function lean_get_retina_image( $image_id, $image_size = 'full', $retina_image_size = 'full' ) {
	$data_1x = wp_get_attachment_image_src( $image_id, $image_size );
	$data_2x = wp_get_attachment_image_src( $image_id, $retina_image_size );
	return [
		'1x' => empty( $data_1x ) ? '' : $data_1x[0],
		'2x' => empty( $data_2x ) ? '' : $data_2x[0],
	];
}
