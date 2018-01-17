<?php
/**
 * Hawaiifun api
 */


function hawaiifunapi_form(){
	global $post;

	$id = $post->ID;

	switch ($id):

		// san_diego_form == del mar
		case 7925:
			$html = "
				<div id=\"hawaiifun\" class=\"pc--form hawaiifun--popup\">

					<script type=\"text/javascript\">
					    // Activity group settings
					    var group1 = {
					      supplierid: 465,
					      activityids: [ 4043],
					      guesttypeids: [ 1594 ],
					      activityprices: {
					        4043: { 1594: 195.00},
					        
					      },
					      activitydescriptions: {
					        4043: 'Save by Booking online'
					      },
					      datecontrolid: 'date_g1',
					      pricecontrolid: 'price_g1',
					      guesttypecontrolids: {
					        1594: 'guests_g1_t1594'
					      },
					      cancellationpolicycontrolid: 'cancellationpolicy',
						  activityid: null
					    };

					    function showCalendar(group) {
					      var minavailability = { guests: {} };
					      var failure = false;
					      $.each(group.guesttypeids, function(key, value) {
					        if (failure) return;
					        var guesttypeid = value;
					        var guestscount = getGuestsCount(group, guesttypeid, true);
					        if (guestscount == null) {
					          failure = true;
					        } else {
					          minavailability.guests[guesttypeid] = guestscount;
					        }
					      });
					      if (!failure) {
					        // Show calendar (only if all guest type counts are correct)
					        calendar(group.activityids, group.datecontrolid, false, minavailability);
					      }
					    }
						
					    function formatMoney(n) {
					      var c = 2, d = \".\", t = \",\", s = n < 0 ? \"-\" : \"\", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + \"\", j = (j = i.length) > 3 ? j % 3 : 0;
					      return s + (j ? i.substr(0, j) + t : \"\") + i.substr(j).replace(/(\d{3})(?=\d)/g, \"$1\" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : \"\");
					    }
						
					    function showPriceAndAvailability(group) {
					      var activityid = getSelectedActivityId(group, false);
					      var activitydate = getActivityDate(group, false);
					      var minavailability = { guests: {} };
					      var failure = false;
					      $.each(group.guesttypeids, function(key, value) {
					        if (failure) return;
					        var guesttypeid = value;
					        var guestscount = getGuestsCount(group, guesttypeid, false);
					        if (guestscount == null) {
					          failure = true;
					        } else {
					          minavailability.guests[guesttypeid] = guestscount;
					        }
					      });

					      if (activitydate != null && !failure) {
					        checkAvailability(function(data) {
							  group.activityid = null;
					          $.each(group.activityids, function(key, value) {
					            // Enable or disable activities based on availability (only if activity date is selected and all guest types are correct)
					            var activityid = value;
								if (data[activityid]) {
								  group.activityid = activityid;
								}
					          });
							  if (group.activityid == null) {
							    $('#availability').html('Not enough availability');
							    $('#' + group.pricecontrolid).html('');
							  } else {
							    $('#availability').html(group.activitydescriptions[group.activityid] + ' - Seats Available');
					            var price = 0.0;
							    $.each(group.guesttypeids, function(key, value) {
							      var guesttypeid = value;
							      var guestscount = getGuestsCount(group, guesttypeid, false);
							      var guesttypeprice = group.activityprices[group.activityid][guesttypeid];
							      price += guestscount * guesttypeprice;
								});
							    $('#' + group.pricecontrolid).html('$' + formatMoney(price));
							  }
					        }, group.activityids, activitydate, minavailability);
					      }
					    }

					    function getSelectedActivityId(group, showWarningIfNoActivitySelected) {
					      var activityid = group.activityid;
					      if (activityid == null && showWarningIfNoActivitySelected) {
					        alert('Please select Flight');
					      }
					      return activityid;
					    }
						
					    function getGuestsCount(group, guestTypeId, showWarningIfWrongFormat) {
					      var guestscountstr = $('#' + group.guesttypecontrolids[guestTypeId]).val();
					      if (guestscountstr == '') return 0;
					      if (!/^\d+$/.test(guestscountstr)) {
					        if (showWarningIfWrongFormat) {
					          alert('Please enter number of Passenger(s)');
					        }
					        return null;
					      }
					      return parseInt(guestscountstr);
					    }

					    function getActivityDate(group, showWarningIfWrongFormat) {
					      var activitydatestr = $('#' + group.datecontrolid).val();
					      if (!/^\d\d?\/\d\d?\/\d\d\d\d$/.test(activitydatestr)) {
					        if (showWarningIfWrongFormat) {
					          alert('Please select Date for Flight');
					        }
					        return null;
					      }
					      return activitydatestr;
					    }

					    function selectActivity(group, selectedcheckbox) {
					      if (!selectedcheckbox.checked) return;
					      $.each(group.activityids, function(key, value) {
					        if (selectedcheckbox.id == group.activitycheckboxcontrolids[value]) return;
					        $('#' + group.activitycheckboxcontrolids[value]).attr('checked', false);
					      });
					    }

					    function booknow(group) {
					     
					      var activityid = getSelectedActivityId(group, true);
					      if (activityid == null) return false;

					      var activitydate = getActivityDate(group, true);
					      if (activitydate == null) return false;

					      reservation(group.supplierid, activityid, activitydate, '', 0.0);
					      $.each(group.guesttypeids, function(key, value) {
					        var guesttypeid = value;
					        var guestscount = $('#' + group.guesttypecontrolids[guesttypeid]).val();
					        addGuests(guesttypeid, guestscount);
					      }); setAccommodationFixed();
					      setgoogleanalytics('UA-17383286-1');
					      availability_popup();
					      return true;
					    }
					</script>

				    <p>
				        <span>Passenger(s)</span>
				        <select id=\"guests_g1_t1594\" onchange=\"showPriceAndAvailability(group1);\">
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
				        	<option value=\"11\">11</option>
				        	<option value=\"12\">12</option>
				        	<option value=\"13\">13</option>
				        	<option value=\"14\">14</option>
				        	<option value=\"15\">15</option>
				        	<option value=\"16\">16</option>
				        	<option value=\"17\">17</option>
				        	<option value=\"18\">18</option>
				        	<option value=\"19\">19</option>
				        	<option value=\"20\">20</option>
				        	<option value=\"21\">21</option>
				        	<option value=\"22\">22</option>
				        	<option value=\"23\">23</option>
				        	<option value=\"24\">24</option>
				        	<option value=\"25\">25</option>	
				        </select>
				    </p>

				  <p>
				    <span>Online special price $189 (Regular rate $220 pp)</span>
				  </p>

				  <p class=\"header\">
				    <span>Choose Date</span>
				    <input placeholder=\" Select Date\" id=\"date_g1\" onclick=\"showCalendar(group1);\" onchange=\"showPriceAndAvailability(group1);\" readOnly size=\"15\">
				  </p>
				    
				  <hr />

				  <p>Total Price: <span id=\"price_g1\"></span></p>

				  <hr />

				  <script type=\"text/javascript\">showPriceAndAvailability(group1);</script>

				  <p>
				    <input type=\"button\" onclick=\"booknow(group1);\" value=\"Book Now\">
				  	<a class=\"close-popup\" href=\"javascript:\">Close</a>
					  </p>
  			</div>
			";
			break;

		// santa_barbara
		case 7971:
			$html = "
				<div id=\"hawaiifun\" class=\"pc--form hawaiifun--popup\">
				  <script type=\"text/javascript\">
				    // Activity group settings
				    var group1 = {
				      supplierid: 465,
				      activityids: [ 6863],
				      guesttypeids: [ 1594 ],
				      activityprices: {
				        6863: { 1594: 225.00},
				        
				      },
				      activitydescriptions: {
				        6863: 'Save by Booking online'
				      },
				      datecontrolid: 'date_g1',
				      pricecontrolid: 'price_g1',
				      guesttypecontrolids: {
				        1594: 'guests_g1_t1594'
				      },
				      cancellationpolicycontrolid: 'cancellationpolicy',
					    activityid: null
				    };

				    function showCalendar(group) {
				      var minavailability = { guests: {} };
				      var failure = false;
				      $.each(group.guesttypeids, function(key, value) {
				        if (failure) return;
				        var guesttypeid = value;
				        var guestscount = getGuestsCount(group, guesttypeid, true);
				        if (guestscount == null) {
				          failure = true;
				        } else {
				          minavailability.guests[guesttypeid] = guestscount;
				        }
				      });
				      if (!failure) {
				        // Show calendar (only if all guest type counts are correct)
				        calendar(group.activityids, group.datecontrolid, false, minavailability);
				      }
				    }
					
				    function formatMoney(n) {
				      var c = 2, d = \".\", t = \",\", s = n < 0 ? \"-\" : \"\", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + \"\", j = (j = i.length) > 3 ? j % 3 : 0;
				      return s + (j ? i.substr(0, j) + t : \"\") + i.substr(j).replace(/(\d{3})(?=\d)/g, \"$1\" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : \"\");
				    }
					
				    function showPriceAndAvailability(group) {
				      var activityid = getSelectedActivityId(group, false);
				      var activitydate = getActivityDate(group, false);
				      var minavailability = { guests: {} };
				      var failure = false;
				      $.each(group.guesttypeids, function(key, value) {
				        if (failure) return;
				        var guesttypeid = value;
				        var guestscount = getGuestsCount(group, guesttypeid, false);
				        if (guestscount == null) {
				          failure = true;
				        } else {
				          minavailability.guests[guesttypeid] = guestscount;
				        }
				      });

				      if (activitydate != null && !failure) {
				        checkAvailability(function(data) {
						  group.activityid = null;
				          $.each(group.activityids, function(key, value) {
				            // Enable or disable activities based on availability (only if activity date is selected and all guest types are correct)
				            var activityid = value;
							if (data[activityid]) {
							  group.activityid = activityid;
							}
				          });
						  if (group.activityid == null) {
						    $('#availability').html('Not enough availability');
						    $('#' + group.pricecontrolid).html('');
						  } else {
						    $('#availability').html(group.activitydescriptions[group.activityid] + ' - Seats Available');
				            var price = 0.0;
						    $.each(group.guesttypeids, function(key, value) {
						      var guesttypeid = value;
						      var guestscount = getGuestsCount(group, guesttypeid, false);
						      var guesttypeprice = group.activityprices[group.activityid][guesttypeid];
						      price += guestscount * guesttypeprice;
							});
						    $('#' + group.pricecontrolid).html('$' + formatMoney(price));
						  }
				        }, group.activityids, activitydate, minavailability);
				      }
				    }

				    function getSelectedActivityId(group, showWarningIfNoActivitySelected) {
				      var activityid = group.activityid;
				      if (activityid == null && showWarningIfNoActivitySelected) {
				        alert('Please select Flight');
				      }
				      return activityid;
				    }
					
				    function getGuestsCount(group, guestTypeId, showWarningIfWrongFormat) {
				      var guestscountstr = $('#' + group.guesttypecontrolids[guestTypeId]).val();
				      if (guestscountstr == '') return 0;
				      if (!/^\d+$/.test(guestscountstr)) {
				        if (showWarningIfWrongFormat) {
				          alert('Please enter number of Passenger(s)');
				        }
				        return null;
				      }
				      return parseInt(guestscountstr);
				    }

				    function getActivityDate(group, showWarningIfWrongFormat) {
				      var activitydatestr = $('#' + group.datecontrolid).val();
				      if (!/^\d\d?\/\d\d?\/\d\d\d\d$/.test(activitydatestr)) {
				        if (showWarningIfWrongFormat) {
				          alert('Please select Date for Flight');
				        }
				        return null;
				      }
				      return activitydatestr;
				    }

				    function selectActivity(group, selectedcheckbox) {
				      if (!selectedcheckbox.checked) return;
				      $.each(group.activityids, function(key, value) {
				        if (selectedcheckbox.id == group.activitycheckboxcontrolids[value]) return;
				        $('#' + group.activitycheckboxcontrolids[value]).attr('checked', false);
				      });
				    }

				    function booknow(group) {
				     
				      var activityid = getSelectedActivityId(group, true);
				      if (activityid == null) return false;

				      var activitydate = getActivityDate(group, true);
				      if (activitydate == null) return false;

				      reservation(group.supplierid, activityid, activitydate, '', 0.0);
				      $.each(group.guesttypeids, function(key, value) {
				        var guesttypeid = value;
				        var guestscount = $('#' + group.guesttypecontrolids[guesttypeid]).val();
				        addGuests(guesttypeid, guestscount);
				      }); setAccommodationFixed();
				      setgoogleanalytics('UA-17383286-1');
				      availability_popup();
				      return true;
				    }
				  </script>
				  <style>
				    .ui-widget { font-size: 0.75em; }
				    .ui-datepicker td.un { color:red;text-decoration:line-through; }
				    div.ex1 {
				        width:500px;
				        margin: auto;
				    }
				  </style>

				  <p>
				      <span>Passenger(s)</span>
				      <select id=\"guests_g1_t1594\" onchange=\"showPriceAndAvailability(group1);\">
				        <option value=\"1\">1</option>
				        <option value=\"2\">2</option>
					      <option value=\"3\">3</option>
				        <option value=\"4\">4</option>
				        <option value=\"5\">5</option>
				        <option value=\"6\">6</option>
				      </select>
				  </p>
				  <p>Online special price $225 (Regular rate $240 pp)</p>
				  <p>
				    <span class=\"header\">
				      Choose Date
				    </span>
				    <input placeholder=\" Select Date\" id=\"date_g1\" onclick=\"showCalendar(group1);\" onchange=\"showPriceAndAvailability(group1);\" readOnly size=\"15\">
				  </p>
				  <hr />
				  <p><span>Total Price:</span> <span id=\"price_g1\"></span></p>
				  <hr />
				  <script type=\"text/javascript\">showPriceAndAvailability(group1);</script>
				  <p>
				    <input type=\"button\" onclick=\"booknow(group1);\" value=\"Book Now\">
				    <a href='javascript:' class='close-popup'>Close</a>
				  </p>

				</div>
			";
			break;

		// temecula
		case 7970:
			$html = "
				<div id=\"hawaiifun\" class=\"pc--form hawaiifun--popup\">
					<script type=\"text/javascript\">
					// Activity group settings
					var group1 = {
					  supplierid: 465,
					  activityids: [ 4044],
					  guesttypeids: [ 1594 ],
					  activityprices: {
					    4044: { 1594: 155.00},
					    
					  },
					  activitydescriptions: {
					    4044: 'Save by Booking online'
					  },
					  datecontrolid: 'date_g1',
					  pricecontrolid: 'price_g1',
					  guesttypecontrolids: {
					    1594: 'guests_g1_t1594'
					  },
					  cancellationpolicycontrolid: 'cancellationpolicy',
					  activityid: null
					};

					function showCalendar(group) {
					  var minavailability = { guests: {} };
					  var failure = false;
					  $.each(group.guesttypeids, function(key, value) {
					    if (failure) return;
					    var guesttypeid = value;
					    var guestscount = getGuestsCount(group, guesttypeid, true);
					    if (guestscount == null) {
					      failure = true;
					    } else {
					      minavailability.guests[guesttypeid] = guestscount;
					    }
					  });
					  if (!failure) {
					    // Show calendar (only if all guest type counts are correct)
					    calendar(group.activityids, group.datecontrolid, false, minavailability);
					  }
					}

					function formatMoney(n) {
					  var c = 2, d = \".\", t = \",\", s = n < 0 ? \"-\" : \"\", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + \"\", j = (j = i.length) > 3 ? j % 3 : 0;
					  return s + (j ? i.substr(0, j) + t : \"\") + i.substr(j).replace(/(\d{3})(?=\d)/g, \"$1\" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : \"\");
					}

					function showPriceAndAvailability(group) {
					  var activityid = getSelectedActivityId(group, false);
					  var activitydate = getActivityDate(group, false);
					  var minavailability = { guests: {} };
					  var failure = false;
					  $.each(group.guesttypeids, function(key, value) {
					    if (failure) return;
					    var guesttypeid = value;
					    var guestscount = getGuestsCount(group, guesttypeid, false);
					    if (guestscount == null) {
					      failure = true;
					    } else {
					      minavailability.guests[guesttypeid] = guestscount;
					    }
					  });

					  if (activitydate != null && !failure) {
					    checkAvailability(function(data) {
						  group.activityid = null;
					      $.each(group.activityids, function(key, value) {
					        // Enable or disable activities based on availability (only if activity date is selected and all guest types are correct)
					        var activityid = value;
							if (data[activityid]) {
							  group.activityid = activityid;
							}
					      });
						  if (group.activityid == null) {
						    $('#availability').html('Not enough availability');
						    $('#' + group.pricecontrolid).html('');
						  } else {
						    $('#availability').html(group.activitydescriptions[group.activityid] + ' - Seats Available');
					        var price = 0.0;
						    $.each(group.guesttypeids, function(key, value) {
						      var guesttypeid = value;
						      var guestscount = getGuestsCount(group, guesttypeid, false);
						      var guesttypeprice = group.activityprices[group.activityid][guesttypeid];
						      price += guestscount * guesttypeprice;
							});
						    $('#' + group.pricecontrolid).html('$' + formatMoney(price));
						  }
					    }, group.activityids, activitydate, minavailability);
					  }
					}

					function getSelectedActivityId(group, showWarningIfNoActivitySelected) {
					  var activityid = group.activityid;
					  if (activityid == null && showWarningIfNoActivitySelected) {
					    alert('Please select Flight');
					  }
					  return activityid;
					}

					function getGuestsCount(group, guestTypeId, showWarningIfWrongFormat) {
					  var guestscountstr = $('#' + group.guesttypecontrolids[guestTypeId]).val();
					  if (guestscountstr == '') return 0;
					  if (!/^\d+$/.test(guestscountstr)) {
					    if (showWarningIfWrongFormat) {
					      alert('Please enter number of Passenger(s)');
					    }
					    return null;
					  }
					  return parseInt(guestscountstr);
					}

					function getActivityDate(group, showWarningIfWrongFormat) {
					  var activitydatestr = $('#' + group.datecontrolid).val();
					  if (!/^\d\d?\/\d\d?\/\d\d\d\d$/.test(activitydatestr)) {
					    if (showWarningIfWrongFormat) {
					      alert('Please select Date for Flight');
					    }
					    return null;
					  }
					  return activitydatestr;
					}

					function selectActivity(group, selectedcheckbox) {
					  if (!selectedcheckbox.checked) return;
					  $.each(group.activityids, function(key, value) {
					    if (selectedcheckbox.id == group.activitycheckboxcontrolids[value]) return;
					    $('#' + group.activitycheckboxcontrolids[value]).attr('checked', false);
					  });
					}

					function booknow(group) {
					 
					  var activityid = getSelectedActivityId(group, true);
					  if (activityid == null) return false;

					  var activitydate = getActivityDate(group, true);
					  if (activitydate == null) return false;

					  reservation(group.supplierid, activityid, activitydate, '', 0.0);
					  $.each(group.guesttypeids, function(key, value) {
					    var guesttypeid = value;
					    var guestscount = $('#' + group.guesttypecontrolids[guesttypeid]).val();
					    addGuests(guesttypeid, guestscount);
					  }); setAccommodationFixed();
					  setgoogleanalytics('UA-17383286-1');
					  availability_popup();
					  return true;
					}
					</script>
					<style>
					 .ui-widget { font-size: 0.75em; }
					 .ui-datepicker td.un { color:red;text-decoration:line-through; }
					 div.ex1 {
					    width:500px;
					    margin: auto;
					    
					 }

					</style>
					<p>
					  <span>Passenger(s)</span>
					  <select id=\"guests_g1_t1594\" onchange=\"showPriceAndAvailability(group1);\">
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
					      <option value=\"11\">11</option>
					      <option value=\"12\">12</option>
					      <option value=\"13\">13</option>
					      <option value=\"14\">14</option>
					      <option value=\"15\">15</option>
					      <option value=\"16\">16</option>
					      <option value=\"17\">17</option>
					      <option value=\"18\">18</option>
					      <option value=\"19\">19</option>
					      <option value=\"20\">20</option>
					      <option value=\"21\">21</option>
					      <option value=\"22\">22</option>
					      <option value=\"23\">23</option>
					      <option value=\"24\">24</option>
					      <option value=\"25\">25</option>	
					  </select>
					</p>
					<p>Online special price $155 (Regular rate $215pp)</p>
					<p>
					<span class=\"header\">Choose Date</span>
					<input placeholder=\" Select Date\" id=\"date_g1\" onclick=\"showCalendar(group1);\" onchange=\"showPriceAndAvailability(group1);\" readOnly size=\"15\">
					</p> 
					<hr />
					<p><span>Total Price:</span> <span id=\"price_g1\"></span></p>
					<hr />
					<script type=\"text/javascript\">showPriceAndAvailability(group1);</script>
					<p>
					<input type=\"button\" onclick=\"booknow(group1);\" value=\"Book Now\">
					<a href=\"javascript:\" class=\"close-popup\"></a>
					</p>
				</div>
			";
			break;

		// giftflight
		case 8077:
			$html = "
				<form id=\"hawaiifun\" class=\"GroupsForm_861fe1c0 pc--form hawaiifun--popup\">
				  <script type=\"text/javascript\">
				    var groups_861fe1c0_contextData = {
				      groupSelectSelector: '.GroupsForm_861fe1c0 .groupSelect',
				      allActivitySelectContainersSelector: '.GroupsForm_861fe1c0 .activitySelectContainer',
				      activitySelectSubselector: '.activitySelect',
				      allGuestTypeContainersSelector: '.GroupsForm_861fe1c0 .guestTypeContainer',
				      guestCountTextInputSubselector: '.guestCountTextInput',
				      guestCountSelectSubselector: '.guestCountSelect',
				      guestCountLimitForSelectThreshold: 10,
				      singleSeatContainersSelector: '.GroupsForm_861fe1c0 .singleSeatContainer',
				      singleSeatGuestTypeSelectSubselector: '.guestTypeSelect',
				      guestTypeInfos: {
				        '1594': { containerSelector: '.GroupsForm_861fe1c0 .guestTypeContainer.gt1594' },
				        '2701': { containerSelector: '.GroupsForm_861fe1c0 .guestTypeContainer.gt2701' },

				        'null': null
				      },
				      groupInfos: {

				        'null': null
				      },
				      activityInfos: {
				        '6863': {
				          guestCountLimit: 8,
				          guestTypeIds: [ 1594, 2701 ],
				          singleSeatContainerSelector: '.GroupsForm_861fe1c0 .singleSeatContainer.a6863'
				        },
				        '4044': {
				          guestCountLimit: 14,
				          guestTypeIds: [ 1594 ],
				          singleSeatContainerSelector: '.GroupsForm_861fe1c0 .singleSeatContainer.a4044'
				        },
				        '4043': {
				          guestCountLimit: 25,
				          guestTypeIds: [ 1594 ],
				          singleSeatContainerSelector: '.GroupsForm_861fe1c0 .singleSeatContainer.a4043'
				        },

				        'null': null
				      }
				    };
				  </script>
				  <p>
				    <select class=\"groupSelect\" onchange=\"activitySwitch_applyGroup(groups_861fe1c0_contextData)\">
				      <option value=\"a6863\">Solvang-Santa Barbara Wine Country Morning Adventure</option>
				      <option value=\"a4044\">Temecula Champagne Sunrise Adventure</option>
				      <option value=\"a4043\">Del Mar Coastal Champagne Evening Adventure</option>
				    </select>
				  </p>

				  <p>

				    <span class=\"guestTypeContainer gt1594\">
				      # of Passengers:
				      <input type=\"text\" class=\"guestCountTextInput\" value=\"0\" size=\"2\" style=\"display: none;\" />
				      <select class=\"guestCountSelect\">
				        <option value=\"0\">0</option>
				        <option value=\"1\">1</option>
				        <option value=\"2\">2</option>
				        <option value=\"3\">3</option>
				        <option value=\"4\">4</option>
				        <option value=\"5\">5</option>
				        <option value=\"6\">6</option>
				        <option value=\"7\">7</option>
				        <option value=\"8\">8</option>
				      </select>
				    </span>
				  </p>
				  <p>
				    <span class=\"guestTypeContainer gt2701\">
				      Flight PLUS Wine Tasting (non-private)
				      <input type=\"text\" class=\"guestCountTextInput\" value=\"0\" size=\"2\" style=\"display: none;\" />
				      <select class=\"guestCountSelect\">
				        <option value=\"0\">0</option>
				        <option value=\"1\">1</option>
				        <option value=\"2\">2</option>
				        <option value=\"3\">3</option>
				        <option value=\"4\">4</option>
				        <option value=\"5\">5</option>
				        <option value=\"6\">6</option>
				        <option value=\"7\">7</option>
				        <option value=\"8\">8</option>
				      </select>
				    </span>
				  </p>
				  <script type=\"text/javascript\">activitySwitch_applyGroup(groups_861fe1c0_contextData);</script>
				  
				  <p>
				  <input type=\"button\" value=\"Purchase\" onclick=\"var selectedActivityId = activitySwitch_getActivityId(groups_861fe1c0_contextData); reservation('465', selectedActivityId, undefined, '', 0.0);  setGiftCertificate(); if (!activitySwitch_addGuests(groups_861fe1c0_contextData)) return false;      availability_popup(); return false;\" />
				  <a href=\"javascript:\" class=\"close-popup\"></a>
				  </p>

				</form>
			";
			break;

		// for others
		default:
			$html = "
				<form id=\"hawaiifun\" class=\"GroupsForm_40e9607c pc--form hawaiifun--popup GroupsForm_9ad2b236\">
					<script type=\"text/javascript\">
					    var groups_9ad2b236_contextData = {
					      groupSelectSelector: '.GroupsForm_9ad2b236 .groupSelect',
					      allActivitySelectContainersSelector: '.GroupsForm_9ad2b236 .activitySelectContainer',
					      activitySelectSubselector: '.activitySelect',
					      allGuestTypeContainersSelector: '.GroupsForm_9ad2b236 .guestTypeContainer',
					      guestCountTextInputSubselector: '.guestCountTextInput',
					      guestCountSelectSubselector: '.guestCountSelect',
					      guestCountLimitForSelectThreshold: 25,
					      singleSeatContainersSelector: '.GroupsForm_9ad2b236 .singleSeatContainer',
					      singleSeatGuestTypeSelectSubselector: '.guestTypeSelect',
					      guestTypeInfos: {
					        '1594': { containerSelector: '.GroupsForm_9ad2b236 .guestTypeContainer.gt1594' },

					        'null': null
					      },
					      groupInfos: {

					        'null': null
					      },
					      activityInfos: {
					        '6863': {
					          guestCountLimit: 25,
					          guestTypeIds: [ 1594 ],
					          singleSeatContainerSelector: '.GroupsForm_9ad2b236 .singleSeatContainer.a6863'
					        },
					        '4044': {
					          guestCountLimit: 25,
					          guestTypeIds: [ 1594 ],
					          singleSeatContainerSelector: '.GroupsForm_9ad2b236 .singleSeatContainer.a4044'
					        },
					        '4043': {
					          guestCountLimit: 25,
					          guestTypeIds: [ 1594 ],
					          singleSeatContainerSelector: '.GroupsForm_9ad2b236 .singleSeatContainer.a4043'
					        },

					        'null': null
					      }
					    };
				    </script>
					<style>
					.ui-widget{font-size: 0.75em;}.ui-datepicker td.un{color:red;text-decoration:line-through;}div.ex1{width:500px;margin: auto;}
					</style>

					  <p>
					    <span>Select a Flight:</span>
					    <select class=\"groupSelect\" onchange=\"activitySwitch_applyGroup(groups_9ad2b236_contextData)\">
					      <option value=\"a4043\">Del Mar Coastal Champagne Evening</option>
					      <option value=\"a6863\">Santa Barbara Morning</option>
					      <option value=\"a4044\">Temecula Champagne Sunrise</option>
					    </select>
					  </p>

					  <p>
					    <span>Date</span>
					    <input placeholder=\" Select Date\" id=\"input_groups_9ad2b236_date\" onclick=\"showAvailabilityCalendar2(activitySwitch_getActivityId(groups_9ad2b236_contextData), 'input_groups_9ad2b236_date', { local: false, webBooking: true });\" readonly=\"readonly\" size=\"15\" />
					  </p>

					  <p>
					    <span class=\"guestTypeContainer gt1594\">
					      <span>Passenger(s)</span>
					      <input type=\"text\" class=\"guestCountTextInput\" value=\"0\" size=\"2\" style=\"display: none;\" />
					      <select class=\"guestCountSelect\">
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
					        <option value=\"11\">11</option>
					        <option value=\"12\">12</option>
					        <option value=\"13\">13</option>
					        <option value=\"14\">14</option>
					        <option value=\"15\">15</option>
					        <option value=\"16\">16</option>
					        <option value=\"17\">17</option>
					        <option value=\"18\">18</option>
					        <option value=\"19\">19</option>
					        <option value=\"20\">20</option>
					        <option value=\"21\">21</option>
					        <option value=\"22\">22</option>
					        <option value=\"23\">23</option>
					        <option value=\"24\">24</option>
					        <option value=\"25\">25</option>
					      </select>
					    </span>
					  </p>

					  <script type=\"text/javascript\">activitySwitch_applyGroup(groups_9ad2b236_contextData);</script>

					  <p>
					    <input type=\"button\" value=\"Book Now\" onclick=\"var selectedActivityId = activitySwitch_getActivityId(groups_9ad2b236_contextData); reservation('465', selectedActivityId, jQuery('#input_groups_9ad2b236_date').val(), '', 0.0);   if (!activitySwitch_addGuests(groups_9ad2b236_contextData)) return false; setAccommodationFixed(); setgoogleanalytics('UA-17383286-1');  availability_popup(); return false;\" />
					  	<a class=\"close-popup\" href=\"javascript:\">Close</a>
					  </p>
				</form>
			";
			break;
	endswitch;

	echo $html;
}

function include_hawaiifun_scripts() {

	wp_deregister_style('jquire-ui');
	wp_enqueue_style('jquery-ui', '//www.ponorez.com/Calendar/REDMOND/jquery-ui.css');

	wp_deregister_script( 'hawaiifun-calendarjs' );
	wp_enqueue_script( 'hawaiifun-calendarjs', '//www.hawaiifun.org/reservation/common/calendar_js.jsp?jsversion=20121209', array(), null, true );

	wp_deregister_script( 'hawaiifun-functions' );
	wp_enqueue_script( 'hawaiifun-functions', '//www.hawaiifun.org/reservation/external/functions.js?jsversion=20121209', array(), null, true );

	wp_deregister_script( 'hawaiifun-functions2' );
	wp_enqueue_script( 'hawaiifun-functions2', '//www.hawaiifun.org/reservation/external/functions2.js?jsversion=20121209', array(), null, true );

	wp_deregister_script( 'hawaiifun-activityswitch' );
	wp_enqueue_script( 'hawaiifun-activityswitch', '//www.hawaiifun.org/reservation/external/activityswitch-1.js?jsversion=20170214', array(), null, true );

    // below write common scripts
    //$data = '<script></script>';
    
	//wp_add_inline_script( 'hawaiifun-activityswitch', $data );
}

// if hawaiifun api activated, all functions above are working
if ( get_field( 'is-hawaiifun', 'option' ) ) :
	add_action( 'wp_enqueue_scripts', 'include_hawaiifun_scripts', 50 ); // includes scripts
	add_action('wp_footer', 'hawaiifunapi_form');                        // print the html code to popup wrapper
endif;