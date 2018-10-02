<?php
/**
 * The purpose of the ACF helper functions is to provide with the validations so the projects code is cleaner.
 * They check if the field value exists and returns a proper data type if not.
 */


/**
 * Get the source path of an image in 1x and 2x versions from an ACF field.
 *
 * @param string $field_name the ACF field that returns an image ID (an attachment ID).
 * @param int $post_id the post ID.
 * @param string $image_size The 1x image size to be loaded.
 * @param string $retina_image_size The 2x image size to be loaded.
 * @return array Returns 2 array elements, the first one containing the 1x image url and the 2nd
 * containing the retina image url.
 */
function lean_acf_retina_image( $field_name, $post_id, $image_size = 'full', $retina_image_size = 'full' ) {
	$field_value = get_field( $field_name, $post_id );
	$image_id = $field_value ? $field_value : 0;
	return lean_get_retina_image( $image_id, $image_size, $retina_image_size );
}

/**
 * Get the source path of an image in 1x version from an ACF field.
 *
 * @param string $field_name the ACF field that returns an image ID (an attachment ID).
 * @param int $post_id the post ID.
 * @param string $image_size The 1x image size to be loaded.
 * @return string the image or empty string if no image of the given size is found.
 */
function lean_acf_image( $field_name, $post_id, $image_size = 'full' ) {
	$field_value = get_field( $field_name, $post_id );
	$image_id = $field_value ? $field_value : 0;
	return lean_get_image( $image_id, $image_size );
}

/**
 * Get the text from an ACF field.
 *
 * @param string $field_name the ACF field.
 * @param int $post_id the post ID.
 * @return string the field text.
 */
function lean_acf_text( $field_name, $post_id ) {
	$field_value = get_field( $field_name, $post_id );
	return $field_value ? $field_value : '';
}

/**
 * Get an array from an ACF field.
 *
 * @param string $field_name the ACF field.
 * @param int $post_id the post ID.
 * @return array the field value as an array.
 */
function lean_acf_array( $field_name, $post_id ) {
	$field_value = get_field( $field_name, $post_id );
	return $field_value ? $field_value : [];
}

/**
 * Get the link from an ACF field. Always returns an array of 3 elements with keys: title, url and target.
 *
 * @param string $field_name the ACF field.
 * @param int $post_id the post ID.
 * @return array the link values or empty string values.
 */
function lean_acf_link( $field_name, $post_id ) {
	$field_value = get_field( $field_name, $post_id );
	$field_value = $field_value ? $field_value : [];

	$field_value = wp_parse_args( $field_value, [
		'title' => '',
		'url' => '',
		'target' => '',
	]);

	return $field_value;
}

function lean_acf_userdata( $user_id, $key ) {
	$user_key = '_user' .$user_id;
}
