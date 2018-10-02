<?php
/**
 * Returns the Gravity Form field object given a class name
 *
 * @param int    $form_id The form id.
 * @param string $class The class name.
 * @return object the field object.
 */
function lean_get_gformfield_by_class( $form_id, $class ) {
	if ( class_exists( 'RGFormsModel' ) ) {
		$form = RGFormsModel::get_form_meta( $form_id );

		foreach ( $form['fields'] as $field ) {
			$classes = explode( ' ', $field['cssClass'] );
			if ( in_array( $class, $classes ) ) {
				return $field;
			}
		}
	}

	return null;
}

/**
 * Returns the Gravity Form field object given a field label
 *
 * @param int    $form_id The form id.
 * @param string $label The field Label.
 * @return object the field object.
 */
function lean_get_gformfield_by_label( $form_id, $label ) {
	if ( class_exists( 'RGFormsModel' ) ) {
		$form = RGFormsModel::get_form_meta( $form_id );

		foreach ( $form['fields'] as $field ) {
			if ( $field['label'] === $label ) {
				return $field;
			}
		}
	}

	return null;
}