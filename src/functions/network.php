<?php

/**
 * Retreives the user IP address, false if it could not be retreived.
 *
 * @return string the IP Address.
 */
function lean_get_user_ip() {
	return isset( $_SERVER['REMOTE_ADDR'] ) ?
		sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) :
		false;
}
