<?php


function tt_blocking_hyperlinks_in_contact_forms_form_setting( $settings, $form ) {
    $checked = rgar($form, 'blocking_hyperlinks_in_contact_forms') === 'on' ? 'checked' : '';
    $settings[ __( 'Form Basics', 'gravityforms' ) ]['blocking_hyperlinks_in_contact_forms'] = '
        <tr>
            <th><label for="blocking_hyperlinks_in_contact_forms">Do not allow hyperlinks in form entries</label></th>
            <td><input type="checkbox" name="blocking_hyperlinks_in_contact_forms" '.$checked.'></td>
        </tr>';

    return $settings;
}
add_filter( 'gform_form_settings', 'tt_blocking_hyperlinks_in_contact_forms_form_setting', 10, 2 );


// save your custom form setting
function tt_save_blocking_hyperlinks_in_contact_forms_form_setting($form) {
    $form['blocking_hyperlinks_in_contact_forms'] = rgpost( 'blocking_hyperlinks_in_contact_forms' );
    return $form;
}
add_filter( 'gform_pre_form_settings_save', 'tt_save_blocking_hyperlinks_in_contact_forms_form_setting', 10, 1 );



function tt_blocking_hyperlinks_in_contact_forms( $result, $value, $form, $field ) {

// checking for all fields
// otherwise may use: if ( $field->type == 'name' || $field->type == 'textarea' || $field->type == 'text' )

    if ( $form['blocking_hyperlinks_in_contact_forms']!=='on' )
        return $result;

    preg_match('/(http|ftp|mailto)/', $value, $matches);
    if (isset($matches) && is_array($matches) && count($matches)) {
        $result['is_valid'] = false;
        $result['message'] = __( 'Hyperlinks are not allowed here.', 'tourismtiger-theme' );
    }

return $result;
}

add_filter('gform_field_validation', 'tt_blocking_hyperlinks_in_contact_forms', 10, 4 );
