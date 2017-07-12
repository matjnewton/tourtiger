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
		<form id=\"hawaiifun\" class=\"pc--form hawaiifun--popup\">
			<p><label for=\"guests_a4043_t1594\"><span style=\"margin-bottom:7px;display:inline-block;\">Choose Date</span><br /><input id=\"date_a4043\" onclick=\"calendar(4043, 'date_a4043', false);\" readOnly size=\"15\" /></label></p>
			<p><label for=\"guests_a4043_t1594\"><span style=\"margin-bottom:7px;display:inline-block;\">Shared Basket (non private)</span><br /><input type='text' id='guests_a4043_t1594' value='0' size='2' /></label></p>
			<p><label style=\"width:auto!important;\" for=\"cancellationpolicy_a4043\"><input type=\"checkbox\" id=\"cancellationpolicy_a4043\" /><span style=\"margin-left: 5px;\">Our cancellation policy is 48 hours prior to the flight date for a non private basket and 7 days prior for all private flights and group bookings. This includes flight with wine tasting tour.<span></label></p>
			<p><input style=\"width:auto!important;\" class=\"gform_button\" type=\"button\" value=\"Check availability\" onclick=\"if (!checkcancellation(document.getElementById('cancellationpolicy_a4043'))) return false; reservation2('4043', 4043, document.getElementById('date_a4043').value, '', 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0); addGuests(1594, document.getElementById('guests_a4043_t1594').value); setUpgradesFixed(); setAccommodationFixed(); setpaylater(true);  availability_popup(); return false;\" /></p>
		</form>
	";

	echo $html;
}

/**
 * Include hawaiifaun scripts
 */
function include_hawaiifun_scripts() {
	// Calendar JS
	wp_deregister_script( 'hawaiifun-calendarjs' );
	wp_enqueue_script( 'hawaiifun-calendarjs', '//www.hawaiifun.org/reservation/common/calendar_js.jsp?jsversion=20170214', array(), null, true );

	// External functions
	wp_deregister_script( 'hawaiifun-functions' );
	wp_enqueue_script( 'hawaiifun-functions', '//www.hawaiifun.org/reservation/external/functions.js?jsversion=20170214', array(), null, true );

	// Activityswitch functions
	wp_deregister_script( 'hawaiifun-activityswitch' );
	wp_enqueue_script( 'hawaiifun-activityswitch', '//www.hawaiifun.org/reservation/external/activityswitch-1.js?jsversion=20170214', array(), null, true );

	// Inline javascript functions
	$data = '
		var groups_18b9075c_contextData = {
			groupSelectSelector: \'.GroupsForm_18b9075c .groupSelect\',
			allActivitySelectContainersSelector: \'.GroupsForm_18b9075c .activitySelectContainer\',
			activitySelectSubselector: \'.activitySelect\',
			allGuestTypeContainersSelector: \'.GroupsForm_18b9075c .guestTypeContainer\',
			guestCountTextInputSubselector: \'.guestCountTextInput\',
			guestCountSelectSubselector: \'.guestCountSelect\',
			guestCountLimitForSelectThreshold: 10,
			singleSeatContainersSelector: \'.GroupsForm_18b9075c .singleSeatContainer\',
			singleSeatGuestTypeSelectSubselector: \'.guestTypeSelect\',
			guestTypeInfos: {
				\'1594\': { containerSelector: \'.GroupsForm_18b9075c .guestTypeContainer.gt1594\' },
				\'1595\': { containerSelector: \'.GroupsForm_18b9075c .guestTypeContainer.gt1595\' },
				\'1651\': { containerSelector: \'.GroupsForm_18b9075c .guestTypeContainer.gt1651\' },
				\'1597\': { containerSelector: \'.GroupsForm_18b9075c .guestTypeContainer.gt1597\' },
				\'1941\': { containerSelector: \'.GroupsForm_18b9075c .guestTypeContainer.gt1941\' },
				\'2701\': { containerSelector: \'.GroupsForm_18b9075c .guestTypeContainer.gt2701\' },

				\'null\': null
			},
			groupInfos: {
				\'null\': null
			},
			activityInfos: {
				\'4043\': {
					guestCountLimit: 25,
					guestTypeIds: [ 1594 ],
					singleSeatContainerSelector: \'.GroupsForm_18b9075c .singleSeatContainer.a4043\'
				},
				\'5233\': {
					guestCountLimit: 25,
					guestTypeIds: [ 1594, 1597, 1941 ],
					singleSeatContainerSelector: \'.GroupsForm_18b9075c .singleSeatContainer.a5233\'
				},
				\'6863\': {
					guestCountLimit: 8,
					guestTypeIds: [ 1594, 2701 ],
					singleSeatContainerSelector: \'.GroupsForm_18b9075c .singleSeatContainer.a6863\'
				},
				\'7635\': {
					guestCountLimit: 10,
					guestTypeIds: [ 1595, 1651, 2701 ],
					singleSeatContainerSelector: \'.GroupsForm_18b9075c .singleSeatContainer.a7635\'
				},
				\'5424\': {
					guestCountLimit: 25,
					guestTypeIds: [ 1594, 1595, 1651, 1597, 1941 ],
					singleSeatContainerSelector: \'.GroupsForm_18b9075c .singleSeatContainer.a5424\'
				},
				\'4044\': {
					guestCountLimit: 14,
					guestTypeIds: [ 1594 ],
					singleSeatContainerSelector: \'.GroupsForm_18b9075c .singleSeatContainer.a4044\'
				},
				\'5234\': {
					guestCountLimit: 14,
					guestTypeIds: [ 1594 ],
					singleSeatContainerSelector: \'.GroupsForm_18b9075c .singleSeatContainer.a5234\'
				},
				\'4045\': {
					guestCountLimit: 20,
					guestTypeIds: [ 1594, 1595 ],
					singleSeatContainerSelector: \'.GroupsForm_18b9075c .singleSeatContainer.a4045\'
				},
				\'null\': null
			}
		};
    ';
	wp_add_inline_script( 'hawaiifun-activityswitch', $data );
}

if ( get_field( 'is-hawaiifun', 'option' ) ) :
	add_action( 'wp_enqueue_scripts', 'include_hawaiifun_scripts', 50 );
	add_action('wp_footer', 'hawaiifunapi_form');
endif;