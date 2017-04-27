
<div id="datepicker" class="datepicker datepicker-white datepicker-vertical has-cta has-range"> 
    <div class="datepicker-instructions" data-amount="0">Search for amazing  trips</div>
    <div class="input-group datepicker-input-from has-date has-selected-date">
        <label class="input-label" for="datepicker-from-input">
             <!-- <span class="label-txt">from</span> -->
             <span class="input-toggle icon icon-calendar"></span>
             <input type="text" id="datepicker-from-input" class="datepicker-input datepicker-from-input" placeholder="from" autocomplete="off" readonly="readonly">
             <i class="fa fa-calendar cal" aria-hidden="true"></i>
        </label>
    </div> 
    <div id="datepicker-to-input-wrap" class="input-group datepicker-input-to has-date">
       <label class="input-label" for="datepicker-to-input"> 
         <!-- <span class="label-txt">to</span> --> 
         <span class="input-toggle icon icon-calendar"></span> 
         <input type="text" id="datepicker-to-input" class="datepicker-input datepicker-to-input" placeholder="to" autocomplete="off" readonly="readonly"> 
         <i class="fa fa-calendar cal" aria-hidden="true"></i>
       </label> 
    </div> 
</div>
<span ng-click="check_availability_angular_prev_xola()" class="prev_day">Previous Day</span>
<span ng-click="check_availability_angular_next_xola()" class="next_day">Next Day</span>

<?php 
if (isset($_GET["num_people"])) {
   $num_people = $_GET["num_people"];
} else {
   $num_people = 1;
}

?>
  <div id="number_of_people">
    <div class="datepicker-instructions">Number of People</div>
    <input ng-model="num_people_val_model" ng-init="num_people_val_model =<?php echo $num_people; ?>" type="number" size="1" id="num_people_val" name="num_people" min="1" max="50" value="<?php echo $num_people; ?>" class="datepicker-input"  required placeholder="Number of People" />
  </div>

<?php 
if (isset($_GET["search_tour_cat"])) {
   $cat_enable = true;
} else {
   $cat_enable = false;
}

if (isset($_GET["hide_option"])) {
  if(($_GET["hide_option"]) == true) {
    $hide_option = 'style="display:none;"';
  }
} else {
   $hide_option = '';
}

?>
<?php if ($cat_enable) : ?>
  <div <?php echo $hide_option; ?> id="filter_tour_cat">
    <div class="datepicker-instructions">Search by categories</div>
      <?php $search_tour_cat_sidebar = $_GET["search_tour_cat"]; ?>
      <?php //checkbox_term('tour_cat', $post->ID, $search_tour_cat_sidebar); ?>
      <?php //select_term('tour_cat', $post->ID, $search_tour_cat_sidebar); ?>
      <?php 
          $tax  = get_term($search_tour_cat_sidebar)->taxonomy;
          select_term($tax, $post->ID, $search_tour_cat_sidebar);
      ?>
  </div>
<?php endif; ?>


<?php 
$integrate_atlasx = get_field('integrate_atlasx_with_this_website', 'option');

if ( $integrate_atlasx ) { ?>
  <div class="datepicker-cta" > 
    <button  ng-disabled="!num_people_val_model" ng-click="check_availability_xola()" id="" class="btn btn-cta btn-small btn-datepicker">Search Again</button>
  </div> 
<?php } else { ?>

<?php }
?>
 




<script>
  jQuery(document).ready(function($){

    // search page timepiker 
    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = decodeURIComponent(window.location.search.substring(1)),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : sParameterName[1];
            }
        }
    };

    var startTime = getUrlParameter('startTime');
    var endTime = getUrlParameter('endTime');


    var type_search = getUrlParameter('type_search');

    if (type_search == 'one_date') {
      endTime = startTime;
      $("#datepicker-to-input-wrap").hide();


      $('#datepicker-from-input').change(function(event) {
          $start = $('#datepicker-from-input').val();
          $("#datepicker-to-input").val($start);
      });

      $('.prev_day').show();
      $('.next_day').show();
      // $('.next_day').on('click', function(event) {
      //     var datepicker_from = $("#datepicker-from-input").val();
      //     var datepicker_to = $("#datepicker-to-input").val();
      //   console.log(datepicker_from);
      //   console.log(datepicker_to);
      // });
      //$("#datepicker").append('<span ng-click="check_availability_angular()" class="prev_day">Previous Day</span><span ng-click="check_availability_angular()" class="next_day">Next Day</span>');

    }


      jQuery("#datepicker-from-input").daterangepicker({
              locale: {
                format: "YYYY-MM-DD"
              },
              singleDatePicker: true,
              // showDropdowns: true,
              startDate: startTime
      });
      jQuery("#datepicker-to-input").daterangepicker({
              locale: {
                format: "YYYY-MM-DD"
              },
              singleDatePicker: true,
              // showDropdowns: true,
              startDate: endTime
      });

  }) //end document.ready 
</script>