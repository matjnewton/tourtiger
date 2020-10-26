<?php
/**
 * Add scripts im footer
 */
?>

<script type="text/javascript">

	    $(function(){
        	<?php // if ( get_field('relative-header') ) ?>
            // $('.header-bar-wrapper').addClass('no-sticky');

            <?php if ( get_field('header-color') ) : ?>
                $('.site-header').css('background-color', '<?php the_field('header-color') ?>' );
            <?php endif; ?>
	    });

</script>
