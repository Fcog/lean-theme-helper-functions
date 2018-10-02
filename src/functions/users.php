<?php

/**
 * Checks if the current logged in user has certain role
 *
 * @param string $role The role name.
 * @return boolean
 */
function lean_current_user_has_role( $role ) {
	$current_user = wp_get_current_user();

	return ( 0 !== $current_user->ID && in_array( $role, (array) $current_user->roles, true ) );
}
