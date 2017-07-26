<?php
/**
 * Hawaiifun api
 */

/**
 * Shortcode [hawaiifun]
 *
 * -------------------------------------------------
 * Прошу прощения за говнокод ниже, 
 * эту апи кроме как топором, не прикрутить. 
 * -------------------------------------------------
 * I appologize for the damn-code below,
 * there wasn't any ways to integrate hawaiifun API
 * -------------------------------------------------
 * 
 * @return string
 */

function hawaiifunapi_form(){
	global $post;

	$id = $post->ID;

	switch ($id):

		// san_diego_form
		case 7925:
			$html = "
				<form id=\"hawaiifun\" class=\"GroupsForm_40e9607c pc--form hawaiifun--popup\">
					<p><select class=\"groupSelect\" onchange=\"activitySwitch_applyGroup(groups_40e9607c_contextData)\">
					      <option value=\"a4043\">Del Mar Coastal Champagne Evening Adventure</option>
					    </select></p>
					<p><span style=\"margin-right:10px;\">Activity Date</span><input id=\"input_groups_40e9607c_date\" onclick=\"showAvailabilityCalendar2(activitySwitch_getActivityId(groups_40e9607c_contextData), 'input_groups_40e9607c_date', { local: false, webBooking: true });\" readonly=\"readonly\" size=\"15\" /></p>

				  <p>
				    <span class=\"guestTypeContainer gt1594\"><span style=\"margin-right:10px;\">Shared Basket (non private)</span><input type=\"text\" class=\"guestCountTextInput\" value=\"0\" size=\"2\" /><select class=\"guestCountSelect\" style=\"display: none;\">
				        <option value=\"0\">0</option>
				        <option value=\"1\">1</option>
				        <option value=\"2\">2</option>
				        <option value=\"3\">3</option>
				        <option value=\"4\">4</option>
				        <option value=\"5\">5</option>
				        <option value=\"6\">6</option>
				        <option value=\"7\">7</option>
				        <option value=\"8\">8</option>
				        <option value=\"9\">9</option>
				        <option value=\"10\">10</option></select></span>
				  </p>
				  <p>
				    <span class=\"guestTypeContainer gt1595\" style=\"display: none;\">
				    	<span style=\"margin-right:10px;\">Private Basket 2-5 Passengers</span><input type=\"text\" class=\"guestCountTextInput\" value=\"0\" size=\"2\" style=\"display: none;\" /><select class=\"guestCountSelect\" style=\"display: none;\">
				        <option value=\"0\">0</option>
				        <option value=\"1\">1</option>
				        <option value=\"2\">2</option>
				        <option value=\"3\">3</option>
				        <option value=\"4\">4</option>
				        <option value=\"5\">5</option>
				        <option value=\"6\">6</option>
				        <option value=\"7\">7</option>
				        <option value=\"8\">8</option>
				        <option value=\"9\">9</option>
				        <option value=\"10\">10</option>
				      </select>
				    </span>
				  </p>
				  <p>
				    <span class=\"guestTypeContainer gt1651\" style=\"display: none;\"><span style=\"margin-right:10px;\">Private Basket 6-8 Passengers</span><input type=\"text\" class=\"guestCountTextInput\" value=\"0\" size=\"2\" style=\"display: none;\" /><select class=\"guestCountSelect\" style=\"display: none;\">
				        <option value=\"0\">0</option>
				        <option value=\"1\">1</option>
				        <option value=\"2\">2</option>
				        <option value=\"3\">3</option>
				        <option value=\"4\">4</option>
				        <option value=\"5\">5</option>
				        <option value=\"6\">6</option>
				        <option value=\"7\">7</option>
				        <option value=\"8\">8</option>
				        <option value=\"9\">9</option>
				        <option value=\"10\">10</option>
				      </select></span>
				  </p>
				  <p><span class=\"guestTypeContainer gt1597\" style=\"display: none;\"><span style=\"margin-right:10px;\">Private Basket 9-11 Passengers</span>
				      <input type=\"text\" class=\"guestCountTextInput\" value=\"0\" size=\"2\" style=\"display: none;\" />
				      <select class=\"guestCountSelect\" style=\"display: none;\">
				        <option value=\"0\">0</option>
				        <option value=\"1\">1</option>
				        <option value=\"2\">2</option>
				        <option value=\"3\">3</option>
				        <option value=\"4\">4</option>
				        <option value=\"5\">5</option>
				        <option value=\"6\">6</option>
				        <option value=\"7\">7</option>
				        <option value=\"8\">8</option>
				        <option value=\"9\">9</option>
				        <option value=\"10\">10</option></select></span>
				  </p>
				  <p>
				    <span class=\"guestTypeContainer gt1941\" style=\"display: none;\">
				        <span style=\"margin-right:10px;\">Private Basket 12-14 Passengers</span><input type=\"text\" class=\"guestCountTextInput\" value=\"0\" size=\"2\" style=\"display: none;\" /><select class=\"guestCountSelect\" style=\"display: none;\">
				        <option value=\"0\">0</option>
				        <option value=\"1\">1</option>
				        <option value=\"2\">2</option>
				        <option value=\"3\">3</option>
				        <option value=\"4\">4</option>
				        <option value=\"5\">5</option>
				        <option value=\"6\">6</option>
				        <option value=\"7\">7</option>
				        <option value=\"8\">8</option>
				        <option value=\"9\">9</option>
				        <option value=\"10\">10</option></select></span>
				  </p>
				  <p>
				    <span class=\"guestTypeContainer gt2701\" style=\"display: none;\"><span style=\"margin-right:10px;\">SB Flight and Wine Tasting (non-private)</span>
				      <input type=\"text\" class=\"guestCountTextInput\" value=\"0\" size=\"2\" style=\"display: none;\" /><select class=\"guestCountSelect\" style=\"display: none;\">
				        <option value=\"0\">0</option>
				        <option value=\"1\">1</option>
				        <option value=\"2\">2</option>
				        <option value=\"3\">3</option>
				        <option value=\"4\">4</option>
				        <option value=\"5\">5</option>
				        <option value=\"6\">6</option>
				        <option value=\"7\">7</option>
				        <option value=\"8\">8</option>
				        <option value=\"9\">9</option>
				        <option value=\"10\">10</option></select></span>
				</p>
				<p style=\"display: none;\">
				  <script type=\"text/javascript\">activitySwitch_applyGroup(groups_40e9607c_contextData);</script>
				  <input checked style=\"display: none;margin-right:10px;\" type=\"checkbox\" id=\"chk_groups_40e9607c_cancellationPolicy\"/><label style=\"display:inline;\" for=\"chk_groups_40e9607c_cancellationPolicy\">Our cancellation policy is 48 hours prior to the flight date for a non private basket and 7 days prior for all private flights and group bookings. This includes flight with wine tasting tour.</label>
				</p>
				<p>
				  <input type=\"button\" value=\"Check availability\" onclick=\"if (!checkcancellation(jQuery('#chk_groups_40e9607c_cancellationPolicy').get(0))) return false;  var selectedActivityId = activitySwitch_getActivityId(groups_40e9607c_contextData); reservation('465', selectedActivityId, jQuery('#input_groups_40e9607c_date').val(), '', 0.0);   if (!activitySwitch_addGuests(groups_40e9607c_contextData)) return false;      availability_popup(); return false;\" />
				</p>
				</form>
			";
			break;

		// santa_barbara
		case 7971:
			$html = "
				<form id=\"hawaiifun\" class=\"GroupsForm_40e9607c pc--form hawaiifun--popup\">
					<p><select class=\"groupSelect\" onchange=\"activitySwitch_applyGroup(groups_40e9607c_contextData)\">
					      <option value=\"a6863\">Solvang-Santa Barbara Wine Country Morning Adventure</option>
					      <option value=\"a7635\">Solvang-Santa Barbara Wine Country Flight and Wine Tasting Tour</option>
					    </select></p>
					<p><span style=\"margin-right:10px;\">Activity Date</span><input id=\"input_groups_40e9607c_date\" onclick=\"showAvailabilityCalendar2(activitySwitch_getActivityId(groups_40e9607c_contextData), 'input_groups_40e9607c_date', { local: false, webBooking: true });\" readonly=\"readonly\" size=\"15\" /></p>

				  <p>
				    <span class=\"guestTypeContainer gt1594\" style=\"display: none;\"><span style=\"margin-right:10px;\">Shared Basket (non private)</span><input type=\"text\" class=\"guestCountTextInput\" value=\"0\" size=\"2\" style=\"display: none;\" /><select class=\"guestCountSelect\" style=\"display: none;\">
				        <option value=\"0\">0</option>
				        <option value=\"1\">1</option>
				        <option value=\"2\">2</option>
				        <option value=\"3\">3</option>
				        <option value=\"4\">4</option>
				        <option value=\"5\">5</option>
				        <option value=\"6\">6</option>
				        <option value=\"7\">7</option>
				        <option value=\"8\">8</option>
				        <option value=\"9\">9</option>
				        <option value=\"10\">10</option></select></span>
				  </p>
				  <p>
				    <span class=\"guestTypeContainer gt1595\" style=\"display: none;\">
				    	<span style=\"margin-right:10px;\">Private Basket 2-5 Passengers</span><input type=\"text\" class=\"guestCountTextInput\" value=\"0\" size=\"2\" style=\"display: none;\" /><select class=\"guestCountSelect\">
				        <option value=\"0\">0</option>
				        <option value=\"1\">1</option>
				        <option value=\"2\">2</option>
				        <option value=\"3\">3</option>
				        <option value=\"4\">4</option>
				        <option value=\"5\">5</option>
				        <option value=\"6\">6</option>
				        <option value=\"7\">7</option>
				        <option value=\"8\">8</option>
				        <option value=\"9\">9</option>
				        <option value=\"10\">10</option>
				      </select>
				    </span>
				  </p>
				  <p>
				    <span class=\"guestTypeContainer gt1651\"><span style=\"margin-right:10px;\">Private Basket 6-8 Passengers</span><input type=\"text\" class=\"guestCountTextInput\" value=\"0\" size=\"2\" style=\"display: none;\" /><select class=\"guestCountSelect\">
				        <option value=\"0\">0</option>
				        <option value=\"1\">1</option>
				        <option value=\"2\">2</option>
				        <option value=\"3\">3</option>
				        <option value=\"4\">4</option>
				        <option value=\"5\">5</option>
				        <option value=\"6\">6</option>
				        <option value=\"7\">7</option>
				        <option value=\"8\">8</option>
				        <option value=\"9\">9</option>
				        <option value=\"10\">10</option>
				      </select></span>
				  </p>
				  <p><span class=\"guestTypeContainer gt1597\" style=\"display: none;\"><span style=\"margin-right:10px;\">Private Basket 9-11 Passengers</span>
				      <input type=\"text\" class=\"guestCountTextInput\" value=\"0\" size=\"2\" style=\"display: none;\" />
				      <select class=\"guestCountSelect\" style=\"display: none;\">
				        <option value=\"0\">0</option>
				        <option value=\"1\">1</option>
				        <option value=\"2\">2</option>
				        <option value=\"3\">3</option>
				        <option value=\"4\">4</option>
				        <option value=\"5\">5</option>
				        <option value=\"6\">6</option>
				        <option value=\"7\">7</option>
				        <option value=\"8\">8</option>
				        <option value=\"9\">9</option>
				        <option value=\"10\">10</option></select></span>
				  </p>
				  <p>
				    <span class=\"guestTypeContainer gt1941\" style=\"display: none;\">
				        <span style=\"margin-right:10px;\">Private Basket 12-14 Passengers</span><input type=\"text\" class=\"guestCountTextInput\" value=\"0\" size=\"2\" style=\"display: none;\" /><select class=\"guestCountSelect\" style=\"display: none;\">
				        <option value=\"0\">0</option>
				        <option value=\"1\">1</option>
				        <option value=\"2\">2</option>
				        <option value=\"3\">3</option>
				        <option value=\"4\">4</option>
				        <option value=\"5\">5</option>
				        <option value=\"6\">6</option>
				        <option value=\"7\">7</option>
				        <option value=\"8\">8</option>
				        <option value=\"9\">9</option>
				        <option value=\"10\">10</option></select></span>
				  </p>
				  <p>
				    <span class=\"guestTypeContainer gt2701\"><span style=\"margin-right:10px;\">SB Flight and Wine Tasting (non-private)</span>
				      <input type=\"text\" class=\"guestCountTextInput\" value=\"0\" size=\"2\" style=\"display: none;\" /><select class=\"guestCountSelect\">
				        <option value=\"0\">0</option>
				        <option value=\"1\">1</option>
				        <option value=\"2\">2</option>
				        <option value=\"3\">3</option>
				        <option value=\"4\">4</option>
				        <option value=\"5\">5</option>
				        <option value=\"6\">6</option>
				        <option value=\"7\">7</option>
				        <option value=\"8\">8</option>
				        <option value=\"9\">9</option>
				        <option value=\"10\">10</option></select></span>
				</p>
				<p style=\"display: none;\">
				  <script type=\"text/javascript\">activitySwitch_applyGroup(groups_40e9607c_contextData);</script>
				  <input checked style=\"display: none;margin-right:10px;\" type=\"checkbox\" id=\"chk_groups_40e9607c_cancellationPolicy\"/><label style=\"display:inline;\" for=\"chk_groups_40e9607c_cancellationPolicy\">Our cancellation policy is 48 hours prior to the flight date for a non private basket and 7 days prior for all private flights and group bookings. This includes flight with wine tasting tour.</label>
				</p>
				<p>
				  <input type=\"button\" value=\"Check availability\" onclick=\"if (!checkcancellation(jQuery('#chk_groups_40e9607c_cancellationPolicy').get(0))) return false;  var selectedActivityId = activitySwitch_getActivityId(groups_40e9607c_contextData); reservation('465', selectedActivityId, jQuery('#input_groups_40e9607c_date').val(), '', 0.0);   if (!activitySwitch_addGuests(groups_40e9607c_contextData)) return false;      availability_popup(); return false;\" />
				</p>
				</form>
			";
			break;

		// temecula
		case 7970:
			$html = "
				<form id=\"hawaiifun\" class=\"GroupsForm_40e9607c pc--form hawaiifun--popup\">
					<p><select class=\"groupSelect\" onchange=\"activitySwitch_applyGroup(groups_40e9607c_contextData)\">
					      <option value=\"a4044\">Temecula Champagne Sunrise Adventure</option>
					    </select></p>
					<p><span style=\"margin-right:10px;\">Activity Date</span><input id=\"input_groups_40e9607c_date\" onclick=\"showAvailabilityCalendar2(activitySwitch_getActivityId(groups_40e9607c_contextData), 'input_groups_40e9607c_date', { local: false, webBooking: true });\" readonly=\"readonly\" size=\"15\" /></p>

				  <p>
				    <span class=\"guestTypeContainer gt1594\"><span style=\"margin-right:10px;\">Shared Basket (non private)</span><input type=\"text\" class=\"guestCountTextInput\" value=\"0\" size=\"2\" /><select class=\"guestCountSelect\" style=\"display: none;\">
				        <option value=\"0\">0</option>
				        <option value=\"1\">1</option>
				        <option value=\"2\">2</option>
				        <option value=\"3\">3</option>
				        <option value=\"4\">4</option>
				        <option value=\"5\">5</option>
				        <option value=\"6\">6</option>
				        <option value=\"7\">7</option>
				        <option value=\"8\">8</option>
				        <option value=\"9\">9</option>
				        <option value=\"10\">10</option></select></span>
				  </p>
				  <p>
				    <span class=\"guestTypeContainer gt1595\" style=\"display: none;\">
				    	<span style=\"margin-right:10px;\">Private Basket 2-5 Passengers</span><input type=\"text\" class=\"guestCountTextInput\" value=\"0\" size=\"2\" style=\"display: none;\" /><select class=\"guestCountSelect\" style=\"display: none;\">
				        <option value=\"0\">0</option>
				        <option value=\"1\">1</option>
				        <option value=\"2\">2</option>
				        <option value=\"3\">3</option>
				        <option value=\"4\">4</option>
				        <option value=\"5\">5</option>
				        <option value=\"6\">6</option>
				        <option value=\"7\">7</option>
				        <option value=\"8\">8</option>
				        <option value=\"9\">9</option>
				        <option value=\"10\">10</option>
				      </select>
				    </span>
				  </p>
				  <p>
				    <span class=\"guestTypeContainer gt1651\" style=\"display: none;\"><span style=\"margin-right:10px;\">Private Basket 6-8 Passengers</span><input type=\"text\" class=\"guestCountTextInput\" value=\"0\" size=\"2\" style=\"display: none;\" /><select class=\"guestCountSelect\" style=\"display: none;\">
				        <option value=\"0\">0</option>
				        <option value=\"1\">1</option>
				        <option value=\"2\">2</option>
				        <option value=\"3\">3</option>
				        <option value=\"4\">4</option>
				        <option value=\"5\">5</option>
				        <option value=\"6\">6</option>
				        <option value=\"7\">7</option>
				        <option value=\"8\">8</option>
				        <option value=\"9\">9</option>
				        <option value=\"10\">10</option>
				      </select></span>
				  </p>
				  <p><span class=\"guestTypeContainer gt1597\" style=\"display: none;\"><span style=\"margin-right:10px;\">Private Basket 9-11 Passengers</span>
				      <input type=\"text\" class=\"guestCountTextInput\" value=\"0\" size=\"2\" style=\"display: none;\" />
				      <select class=\"guestCountSelect\" style=\"display: none;\">
				        <option value=\"0\">0</option>
				        <option value=\"1\">1</option>
				        <option value=\"2\">2</option>
				        <option value=\"3\">3</option>
				        <option value=\"4\">4</option>
				        <option value=\"5\">5</option>
				        <option value=\"6\">6</option>
				        <option value=\"7\">7</option>
				        <option value=\"8\">8</option>
				        <option value=\"9\">9</option>
				        <option value=\"10\">10</option></select></span>
				  </p>
				  <p>
				    <span class=\"guestTypeContainer gt1941\" style=\"display: none;\">
				        <span style=\"margin-right:10px;\">Private Basket 12-14 Passengers</span><input type=\"text\" class=\"guestCountTextInput\" value=\"0\" size=\"2\" style=\"display: none;\" /><select class=\"guestCountSelect\" style=\"display: none;\">
				        <option value=\"0\">0</option>
				        <option value=\"1\">1</option>
				        <option value=\"2\">2</option>
				        <option value=\"3\">3</option>
				        <option value=\"4\">4</option>
				        <option value=\"5\">5</option>
				        <option value=\"6\">6</option>
				        <option value=\"7\">7</option>
				        <option value=\"8\">8</option>
				        <option value=\"9\">9</option>
				        <option value=\"10\">10</option></select></span>
				  </p>
				  <p>
				    <span class=\"guestTypeContainer gt2701\" style=\"display: none;\"><span style=\"margin-right:10px;\">SB Flight and Wine Tasting (non-private)</span>
				      <input type=\"text\" class=\"guestCountTextInput\" value=\"0\" size=\"2\" style=\"display: none;\" /><select class=\"guestCountSelect\" style=\"display: none;\">
				        <option value=\"0\">0</option>
				        <option value=\"1\">1</option>
				        <option value=\"2\">2</option>
				        <option value=\"3\">3</option>
				        <option value=\"4\">4</option>
				        <option value=\"5\">5</option>
				        <option value=\"6\">6</option>
				        <option value=\"7\">7</option>
				        <option value=\"8\">8</option>
				        <option value=\"9\">9</option>
				        <option value=\"10\">10</option></select></span>
				</p>
				<p style=\"display: none;\">
				  <script type=\"text/javascript\">activitySwitch_applyGroup(groups_40e9607c_contextData);</script>
				  <input checked style=\"display: none;margin-right:10px;\" type=\"checkbox\" id=\"chk_groups_40e9607c_cancellationPolicy\"/><label style=\"display:inline;\" for=\"chk_groups_40e9607c_cancellationPolicy\">Our cancellation policy is 48 hours prior to the flight date for a non private basket and 7 days prior for all private flights and group bookings. This includes flight with wine tasting tour.</label>
				</p>
				<p>
				  <input type=\"button\" value=\"Check availability\" onclick=\"if (!checkcancellation(jQuery('#chk_groups_40e9607c_cancellationPolicy').get(0))) return false;  var selectedActivityId = activitySwitch_getActivityId(groups_40e9607c_contextData); reservation('465', selectedActivityId, jQuery('#input_groups_40e9607c_date').val(), '', 0.0);   if (!activitySwitch_addGuests(groups_40e9607c_contextData)) return false;      availability_popup(); return false;\" />
				</p>
				</form>
			";
			break;

		// giftflight
		case 8077:
			$html = "
				<form id=\"hawaiifun\" class=\"GroupsForm_40e9607c pc--form hawaiifun--popup\">
                    <p>
                        Shared Basket (non private)
                        <select id='guests_a4045_t1594'>
                          <option value='0'>0</option>
                          <option value='1'>1</option>
                          <option value='2'>2</option>
                          <option value='3'>3</option>
                          <option value='4'>4</option>
                          <option value='5'>5</option>
                          <option value='6'>6</option>
                          <option value='7'>7</option>
                          <option value='8'>8</option>
                          <option value='9'>9</option>
                          <option value='10'>10</option>
                          <option value='11'>11</option>
                          <option value='12'>12</option>
                          <option value='13'>13</option>
                          <option value='14'>14</option>
                          <option value='15'>15</option>
                          <option value='16'>16</option>
                          <option value='17'>17</option>
                          <option value='18'>18</option>
                          <option value='19'>19</option>
                          <option value='20'>20</option>
                        </select>
                    </p>
                    <p>
                        Private Basket 2-5 Passengers
                        <select id='guests_a4045_t1595'>
                          <option value='0'>0</option>
                          <option value='1'>1</option>
                          <option value='2'>2</option>
                          <option value='3'>3</option>
                          <option value='4'>4</option>
                          <option value='5'>5</option>
                          <option value='6'>6</option>
                          <option value='7'>7</option>
                          <option value='8'>8</option>
                          <option value='9'>9</option>
                          <option value='10'>10</option>
                          <option value='11'>11</option>
                          <option value='12'>12</option>
                          <option value='13'>13</option>
                          <option value='14'>14</option>
                          <option value='15'>15</option>
                          <option value='16'>16</option>
                          <option value='17'>17</option>
                          <option value='18'>18</option>
                          <option value='19'>19</option>
                          <option value='20'>20</option>
                        </select>
                    </p>
                    <h5>Upgrades:</h5>
                    <p>
                        Add Complimentary Anniversary Banner
                        <input type=\"text\" id=\"upgrades_a4045_u1902\" value=\"0\" size=\"2\" />
                    </p>
                    <p>
                        Add Complimentary Happy Birthday Banner
                        <input type=\"text\" id=\"upgrades_a4045_u1901\" value=\"0\" size=\"2\" />
                    </p>
                    <p>
                        <input type=\"button\" value=\"Purchase\" onclick=\"reservation2('4045', 4045, undefined, '', 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0); setGiftCertificate(); addGuests(1594, document.getElementById('guests_a4045_t1594').value); addGuests(1595, document.getElementById('guests_a4045_t1595').value); addUpgrades(1902, document.getElementById('upgrades_a4045_u1902').value); addUpgrades(1901, document.getElementById('upgrades_a4045_u1901').value); setUpgradesFixed(); setAccommodationFixed();  availability_popup(); return false;\" />
                    </p>
                </form>
			";
			break;

		// for others
		default:
			$html = "
				<form id=\"hawaiifun\" class=\"GroupsForm_40e9607c pc--form hawaiifun--popup\">
					<p><select class=\"groupSelect\" onchange=\"activitySwitch_applyGroup(groups_40e9607c_contextData)\">
					      <option value=\"false\">-- Select Adventure --</option>
					      <option value=\"a4043\">Del Mar Coastal Champagne Evening Adventure</option>
					      <option value=\"a5233\">Del Mar Coastal Champagne Evening Adventure</option>
					      <option value=\"a6863\">Solvang-Santa Barbara Wine Country Morning Adventure</option>
					      <option value=\"a7635\">Solvang-Santa Barbara Wine Country Flight and Wine Tasting Tour</option>
					      <option value=\"a5424\">18HG (14) Del Mar Coastal Champagne Evening Adventure</option>
					      <option value=\"a4044\">Temecula Champagne Sunrise Adventure</option>
					      <option value=\"a5234\">Temecula Champagne Sunrise Adventure</option>
					      <option value=\"a4045\">Gift Flight Ticket</option>
					    </select></p>
					<p><span style=\"margin-right:10px;\">Activity Date</span><input id=\"input_groups_40e9607c_date\" onclick=\"showAvailabilityCalendar2(activitySwitch_getActivityId(groups_40e9607c_contextData), 'input_groups_40e9607c_date', { local: false, webBooking: true });\" readonly=\"readonly\" size=\"15\" /></p>

				  <p>
				    <span class=\"guestTypeContainer gt1594\" style=\"display: none;\"><span style=\"margin-right:10px;\">Shared Basket (non private)</span><input type=\"text\" class=\"guestCountTextInput\" value=\"0\" size=\"2\" style=\"display: none;\" /><select class=\"guestCountSelect\" style=\"display: none;\">
				        <option value=\"0\">0</option>
				        <option value=\"1\">1</option>
				        <option value=\"2\">2</option>
				        <option value=\"3\">3</option>
				        <option value=\"4\">4</option>
				        <option value=\"5\">5</option>
				        <option value=\"6\">6</option>
				        <option value=\"7\">7</option>
				        <option value=\"8\">8</option>
				        <option value=\"9\">9</option>
				        <option value=\"10\">10</option></select></span>
				  </p>
				  <p>
				    <span class=\"guestTypeContainer gt1595\" style=\"display: none;\">
				    	<span style=\"margin-right:10px;\">Private Basket 2-5 Passengers</span><input type=\"text\" class=\"guestCountTextInput\" value=\"0\" size=\"2\" style=\"display: none;\" /><select class=\"guestCountSelect\" style=\"display: none;\">
				        <option value=\"0\">0</option>
				        <option value=\"1\">1</option>
				        <option value=\"2\">2</option>
				        <option value=\"3\">3</option>
				        <option value=\"4\">4</option>
				        <option value=\"5\">5</option>
				        <option value=\"6\">6</option>
				        <option value=\"7\">7</option>
				        <option value=\"8\">8</option>
				        <option value=\"9\">9</option>
				        <option value=\"10\">10</option>
				      </select>
				    </span>
				  </p>
				  <p>
				    <span class=\"guestTypeContainer gt1651\" style=\"display: none;\"><span style=\"margin-right:10px;\">Private Basket 6-8 Passengers</span><input type=\"text\" class=\"guestCountTextInput\" value=\"0\" size=\"2\" style=\"display: none;\" /><select class=\"guestCountSelect\" style=\"display: none;\">
				        <option value=\"0\">0</option>
				        <option value=\"1\">1</option>
				        <option value=\"2\">2</option>
				        <option value=\"3\">3</option>
				        <option value=\"4\">4</option>
				        <option value=\"5\">5</option>
				        <option value=\"6\">6</option>
				        <option value=\"7\">7</option>
				        <option value=\"8\">8</option>
				        <option value=\"9\">9</option>
				        <option value=\"10\">10</option>
				      </select></span>
				  </p>
				  <p><span class=\"guestTypeContainer gt1597\" style=\"display: none;\"><span style=\"margin-right:10px;\">Private Basket 9-11 Passengers</span>
				      <input type=\"text\" class=\"guestCountTextInput\" value=\"0\" size=\"2\" style=\"display: none;\" />
				      <select class=\"guestCountSelect\" style=\"display: none;\">
				        <option value=\"0\">0</option>
				        <option value=\"1\">1</option>
				        <option value=\"2\">2</option>
				        <option value=\"3\">3</option>
				        <option value=\"4\">4</option>
				        <option value=\"5\">5</option>
				        <option value=\"6\">6</option>
				        <option value=\"7\">7</option>
				        <option value=\"8\">8</option>
				        <option value=\"9\">9</option>
				        <option value=\"10\">10</option></select></span>
				  </p>
				  <p>
				    <span class=\"guestTypeContainer gt1941\" style=\"display: none;\">
				        <span style=\"margin-right:10px;\">Private Basket 12-14 Passengers</span><input type=\"text\" class=\"guestCountTextInput\" value=\"0\" size=\"2\" style=\"display: none;\" /><select class=\"guestCountSelect\" style=\"display: none;\">
				        <option value=\"0\">0</option>
				        <option value=\"1\">1</option>
				        <option value=\"2\">2</option>
				        <option value=\"3\">3</option>
				        <option value=\"4\">4</option>
				        <option value=\"5\">5</option>
				        <option value=\"6\">6</option>
				        <option value=\"7\">7</option>
				        <option value=\"8\">8</option>
				        <option value=\"9\">9</option>
				        <option value=\"10\">10</option></select></span>
				  </p>
				  <p>
				    <span class=\"guestTypeContainer gt2701\" style=\"display: none;\"><span style=\"margin-right:10px;\">SB Flight and Wine Tasting (non-private)</span>
				      <input type=\"text\" class=\"guestCountTextInput\" value=\"0\" size=\"2\" style=\"display: none;\" /><select class=\"guestCountSelect\" style=\"display: none;\">
				        <option value=\"0\">0</option>
				        <option value=\"1\">1</option>
				        <option value=\"2\">2</option>
				        <option value=\"3\">3</option>
				        <option value=\"4\">4</option>
				        <option value=\"5\">5</option>
				        <option value=\"6\">6</option>
				        <option value=\"7\">7</option>
				        <option value=\"8\">8</option>
				        <option value=\"9\">9</option>
				        <option value=\"10\">10</option></select></span>
				</p>
				<p style=\"display: none;\">
				  <script type=\"text/javascript\">activitySwitch_applyGroup(groups_40e9607c_contextData);</script>
				  <input checked style=\"display: none;margin-right:10px;\" type=\"checkbox\" id=\"chk_groups_40e9607c_cancellationPolicy\"/><label style=\"display:inline;\" for=\"chk_groups_40e9607c_cancellationPolicy\">Our cancellation policy is 48 hours prior to the flight date for a non private basket and 7 days prior for all private flights and group bookings. This includes flight with wine tasting tour.</label>
				</p>
				<p>
				  <input type=\"button\" value=\"Check availability\" onclick=\"if (!checkcancellation(jQuery('#chk_groups_40e9607c_cancellationPolicy').get(0))) return false;  var selectedActivityId = activitySwitch_getActivityId(groups_40e9607c_contextData); reservation('465', selectedActivityId, jQuery('#input_groups_40e9607c_date').val(), '', 0.0);   if (!activitySwitch_addGuests(groups_40e9607c_contextData)) return false;      availability_popup(); return false;\" />
				</p>
				</form>
			";
			break;
	endswitch;

	echo $html;
}

function include_hawaiifun_scripts() {

	wp_deregister_script( 'hawaiifun-calendarjs' );
	wp_enqueue_script( 'hawaiifun-calendarjs', '//www.hawaiifun.org/reservation/common/calendar_js.jsp?jsversion=20170214', array(), null, true );

	wp_deregister_script( 'hawaiifun-functions' );
	wp_enqueue_script( 'hawaiifun-functions', '//www.hawaiifun.org/reservation/external/functions.js?jsversion=20170214', array(), null, true );

	wp_deregister_script( 'hawaiifun-activityswitch' );
	wp_enqueue_script( 'hawaiifun-activityswitch', '//www.hawaiifun.org/reservation/external/activityswitch-1.js?jsversion=20170214', array(), null, true );

	$data = '
		var groups_40e9607c_contextData = {
	      groupSelectSelector: \'.GroupsForm_40e9607c .groupSelect\',
	      allActivitySelectContainersSelector: \'.GroupsForm_40e9607c .activitySelectContainer\',
	      activitySelectSubselector: \'.activitySelect\',
	      allGuestTypeContainersSelector: \'.GroupsForm_40e9607c .guestTypeContainer\',
	      guestCountTextInputSubselector: \'.guestCountTextInput\',
	      guestCountSelectSubselector: \'.guestCountSelect\',
	      guestCountLimitForSelectThreshold: 10,
	      singleSeatContainersSelector: \'.GroupsForm_40e9607c .singleSeatContainer\',
	      singleSeatGuestTypeSelectSubselector: \'.guestTypeSelect\',
	      guestTypeInfos: {
	        \'1594\': { containerSelector: \'.GroupsForm_40e9607c .guestTypeContainer.gt1594\' },
	        \'1595\': { containerSelector: \'.GroupsForm_40e9607c .guestTypeContainer.gt1595\' },
	        \'1651\': { containerSelector: \'.GroupsForm_40e9607c .guestTypeContainer.gt1651\' },
	        \'1597\': { containerSelector: \'.GroupsForm_40e9607c .guestTypeContainer.gt1597\' },
	        \'1941\': { containerSelector: \'.GroupsForm_40e9607c .guestTypeContainer.gt1941\' },
	        \'2701\': { containerSelector: \'.GroupsForm_40e9607c .guestTypeContainer.gt2701\' },

	        \'null\': null
	      },
	      groupInfos: {

	        \'null\': null
	      },
	      activityInfos: {
	        \'4043\': {
	          guestCountLimit: 25,
	          guestTypeIds: [ 1594 ],
	          singleSeatContainerSelector: \'.GroupsForm_40e9607c .singleSeatContainer.a4043\'
	        },
	        \'5233\': {
	          guestCountLimit: 25,
	          guestTypeIds: [ 1594, 1597, 1941 ],
	          singleSeatContainerSelector: \'.GroupsForm_40e9607c .singleSeatContainer.a5233\'
	        },
	        \'6863\': {
	          guestCountLimit: 8,
	          guestTypeIds: [ 1594, 2701 ],
	          singleSeatContainerSelector: \'.GroupsForm_40e9607c .singleSeatContainer.a6863\'
	        },
	        \'7635\': {
	          guestCountLimit: 10,
	          guestTypeIds: [ 1595, 1651, 2701 ],
	          singleSeatContainerSelector: \'.GroupsForm_40e9607c .singleSeatContainer.a7635\'
	        },
	        \'5424\': {
	          guestCountLimit: 25,
	          guestTypeIds: [ 1594, 1595, 1651, 1597, 1941 ],
	          singleSeatContainerSelector: \'.GroupsForm_40e9607c .singleSeatContainer.a5424\'
	        },
	        \'4044\': {
	          guestCountLimit: 14,
	          guestTypeIds: [ 1594 ],
	          singleSeatContainerSelector: \'.GroupsForm_40e9607c .singleSeatContainer.a4044\'
	        },
	        \'5234\': {
	          guestCountLimit: 14,
	          guestTypeIds: [ 1594 ],
	          singleSeatContainerSelector: \'.GroupsForm_40e9607c .singleSeatContainer.a5234\'
	        },
	        \'4045\': {
	          guestCountLimit: 20,
	          guestTypeIds: [ 1594, 1595 ],
	          singleSeatContainerSelector: \'.GroupsForm_40e9607c .singleSeatContainer.a4045\'
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