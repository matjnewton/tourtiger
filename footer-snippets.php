<?php if(have_rows('footer_snippets', 'option')): ?>
                        
<?php while(have_rows('footer_snippets', 'option')): the_row(); ?>
                           
<?php $snippet = get_sub_field('snippet'); ?>
<?php if($snippet):
echo $snippet;                             
endif; ?>
                                   
<?php endwhile; ?> 
                        
<?php endif; ?>

<?php if(have_rows('sections_area')): ?>
    <?php while(have_rows('sections_area')): the_row(); ?>
        <?php if(have_rows('section_elements')): ?>
            <?php while(have_rows('section_elements')): the_row(); ?>
                <?php if( get_row_layout() == 'content'): ?>
                    <?php
                        $enable_expandable_content = get_sub_field('enable_expandable_content');
                        $open_label = get_sub_field('open_label');
                        $close_label = get_sub_field('close_label');
                    ?>
                    <?php if($enable_expandable_content): ?>
<script type="text/javascript">
jQuery(document).ready(function() {
	var minheight = '41';
	var moretext = '<?php echo $open_label; ?>';
	var lesstext = '<?php echo $close_label; ?>';
	$("#read-more-btn").click(function(){
		if ($(".read-more").height()!=minheight)
			$(".read-more").animate({
				height: minheight+"px"
			}, 400, function() {
			// Animation complete.
			});
		else  {
			var childrenHeight = 0;
			$(".read-more").children().each(function() {
                        childrenHeight += $(this).outerHeight(true);
                    })
			$(".read-more").animate({
				height: childrenHeight
			}, 400, function() {
			// Animation complete.
			});
			}
		if($(this).hasClass("less")) {
			$(this).removeClass("less");
			$(this).html(moretext);
		} else {
			$(this).addClass("less");
			$(this).html(lesstext);
		}
		return false;
	});
});
</script>
                    <?php endif; ?>   
                <?php endif; ?>
                  
            <?php endwhile; ?>
        <?php endif; ?>
                        
    <?php endwhile; ?>
<?php endif; ?>
