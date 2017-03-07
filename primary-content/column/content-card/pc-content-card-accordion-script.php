<?php  add_action("wp_footer", "add_primary_area_accordiion_script", 5);
 
function add_primary_area_accordiion_script() { ?>

	<script type="text/javascript">
		jQuery(function(){
			jQuery('.pc--c__accordion--label').on('click', function(){
				jQuery(this).toggleClass('is_active');
				jQuery(this).closest('.slick-slide').height("auto");
			    jQuery(this).closest('.pc--r__scroll').slick('setOption', 'height', null, true);
			});
		});
	</script>

<?php } ?>