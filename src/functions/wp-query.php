<?php
function lean_meta_query_find_in_serialized( $value, $key ) {
	return [
		'key' => $key,
		'value' => 'i:[0-9]+;((s:[0-9]+)|i):(\")*' . $value . '(\")*;',
        'compare' => 'REGEXP',
    ];
}