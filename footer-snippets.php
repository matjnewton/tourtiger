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
function gatherHeights(){
		var output = [];
		$('.slideout').each(function(){
			$(this).css('height', 'auto');
			output[$(this).attr('data-ref')] = $(this).outerHeight();
			$(this).css('height', 0);
		});
		return output;
	}
var slideoutHeights = [];
	$(window).load(function(){
        slideoutHeights = gatherHeights();
    });
jQuery(document).ready(function() {
	var moretext = '<?php echo $open_label; ?>';
	var lesstext = '<?php echo $close_label; ?>';
	var startEl = $('.slideouttrigger').siblings("p");
	
	if(!$('.slideouttrigger').hasClass('active')){
            $('.slideouttrigger').clone(true).appendTo(startEl);
        }
        $('.slideouttrigger').click(function(e){
            e.preventDefault();
            var ref = $(this).attr('data-ref');
            var h = slideoutHeights[ref];
            if($(this).hasClass('active')){
                $(this).removeClass('active');
                $('.slideout[data-ref="' + ref + '"]').removeClass('active').animate({'height': 0});
                $(".slideout > p:last-child .slideouttrigger").remove();
                $('.slideouttrigger').clone(true).appendTo(startEl).text(moretext).hide().fadeIn();
            }
            else{
                $(this).addClass('active');
                $('.slideout[data-ref="' + ref + '"]').addClass('active').animate({'height': h});
                $(this).clone(true).appendTo(".slideout > p:last-child").text(lesstext).hide().fadeIn();
                startEl.find(".slideouttrigger").remove();
            }
        });
});
</script>
                    <?php endif; ?>   
                <?php endif; ?>
                  
            <?php endwhile; ?>
        <?php endif; ?>
                        
    <?php endwhile; ?>
<?php endif; ?>
