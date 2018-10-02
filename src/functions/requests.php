<?php

/**
 * Gets a sanitized request value. It sanitizes differntly depending on the value type.
 *
 * @param $key string  the request key
 * @param $type string the requested value type
 * @return string
 */
function lean_request( $key, $type ) {
	if ( ! isset( $_REQUEST[ $key ] ) ) {
		return false;
	}

	$value = $_REQUEST[ $key ];

	switch ( $type ) {
		case 'int':
			return (int) wp_unslash( $value );

		case 'email':
			return sanitize_email( wp_unslash( $value ) );

		case 'text':
		default:
			return sanitize_text_field( wp_unslash( $value ) );
	}
}


/**
 * Gets a sanitized text request value.
 * Check sanitization config: https://developer.wordpress.org/reference/functions/sanitize_text_field/
 *
 * @param $key string the request key
 * @return string
 */
function lean_request_text( $key ) {
	return lean_request( $key, 'text' );
}

/**
 * Gets a sanitized number request value.
 *
 * @param $key string the request key
 * @return string
 */
function lean_request_int( $key ) {
	return lean_request( $key, 'int' );
}

/**
 * Gets a sanitized email request value.
 * Check sanitization config: https://codex.wordpress.org/Function_Reference/sanitize_email
 *
 * @param $key string the request key
 * @return string
 */
function lean_request_email( $key ) {
	return lean_request( $key, 'email' );
}

/**
 * Gets a sanitized array from checkboxes request value.
 * Check sanitization config: https://codex.wordpress.org/Function_Reference/sanitize_email
 *
 * @param $key string the request key
 * @return string
 */
function lean_request_checkboxes( $key ) {
  if ( ! isset( $_REQUEST[ $key ] ) ) {
    return false;
  }

  if ( is_array( $_REQUEST[ $key ] ) ) {
    $values = [];
    foreach ( $_REQUEST[ $key ] as $value ) {
      $values[] = sanitize_text_field( wp_unslash( $value ) );
    }
    return $values;
  }

  return sanitize_text_field( wp_unslash( $_REQUEST[ $key ] ) );
}
