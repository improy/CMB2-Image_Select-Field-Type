function cmb2_render_image_select( $field, $escaped_value, $object_id, $object_type, $field_type_object ) {		
    $conditional_value =(isset($field->args['attributes']['data-conditional-value'])?'data-conditional-value="' .esc_attr($field->args['attributes']['data-conditional-value']).'"':'');
    $conditional_id =(isset($field->args['attributes']['data-conditional-id'])?' data-conditional-id="'.esc_attr($field->args['attributes']['data-conditional-id']).'"':'');
    $default_value = $field->args['attributes']['default'];    
	$image_select = '<ul id="cmb2-image-select'.$field->args['_id'].'" class="cmb2-image-select-list">';
	foreach ( $field->options() as $value => $item ) {
		$selected = ($value === ($escaped_value==''?$default_value:$escaped_value )) ? 'checked="checked"' : '';		
		$image_select .= '<li class="cmb2-image-select '.($selected!= ''?'cmb2-image-select-selected':'').'"><label for="' . $field->args['_id'] . esc_attr( $value ) . '">
			<input '.$conditional_value.$conditional_id.' type="radio" id="'. $field->args['_id'] . esc_attr( $value ) . '" name="' . $field->args['_name'] . '" value="' . esc_attr( $value ) . '" ' . $selected . ' class="cmb2-option"><img class="" style=" width: auto; " alt="' . $item['alt'] . '" src="' . $item['img'] . '">
			<br><span>' . esc_html( $item['title'] ) . '</span></label></li>';
	}
	$image_select .= '</ul>';
	$image_select .= $field_type_object->_desc( true );
	echo $image_select;
}add_action( 'cmb2_render_image_select', 'cmb2_render_image_select', 10, 5 );
