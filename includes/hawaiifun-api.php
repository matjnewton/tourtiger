<?php
/**
 * Hawaiifun api
 */

/**
 * Shortcode [hawaiifun]
 * @return string
 */
function hawaiifunapi_form(){
	$html = "
		<form class=\"pc--form\">
			<p><label for=\"guests_a4043_t1594\"><span style=\"margin-bottom:7px;display:inline-block;\">Choose Date</span><br /><input id=\"date_a4043\" onclick=\"calendar(4043, 'date_a4043', false);\" readOnly size=\"15\" /></label></p>
			<p><label for=\"guests_a4043_t1594\"><span style=\"margin-bottom:7px;display:inline-block;\">Shared Basket (non private)</span><br /><input type='text' id='guests_a4043_t1594' value='0' size='2' /></label></p>
			<p><label style=\"width:auto!important;\" for=\"cancellationpolicy_a4043\"><input type=\"checkbox\" id=\"cancellationpolicy_a4043\" /><span style=\"margin-left: 5px;\">Our cancellation policy is 48 hours prior to the flight date for a non private basket and 7 days prior for all private flights and group bookings. This includes flight with wine tasting tour.<span></label></p>
			<p><input style=\"width:auto!important;\" class=\"gform_button\" type=\"button\" value=\"Check availability\" onclick=\"if (!checkcancellation(document.getElementById('cancellationpolicy_a4043'))) return false; reservation2('4043', 4043, document.getElementById('date_a4043').value, '', 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0); addGuests(1594, document.getElementById('guests_a4043_t1594').value); setUpgradesFixed(); setAccommodationFixed(); setpaylater(true);  availability_popup(); return false;\" /></p>
		</form>
	";

	return $html;
}
add_shortcode('hawaiifun', 'hawaiifunapi_form');

