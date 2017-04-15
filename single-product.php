<?php
/**
 * single Rezdy product
 * cpt product
 */

remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'rezdy_product_contents');

function rezdy_product_contents() { 
	$site_layout = genesis_site_layout(); ?>

	<section class="tour-page-content">
        <div class="container">
            <div class="row">

				<?php if(have_rows('sidebar_1')): ?>
					<div id="fixed-on-mobile-productpage" class="col-md-12 tour-nav visible-xs">
						<?php 
						while ( have_rows('sidebar_1') ): 
							the_row();
							if ( get_row_layout() == 'button' ): 
				                $bbt         = get_sub_field('button_text');
				                $cta_onclick = get_sub_field('cta_onclick');
				                $button_type = get_sub_field('button_link_type');
				                $bbl         = get_sub_field('custom_button_link');
				                $third_party = get_sub_field('third_party');
				                $mobd        = get_sub_field('multi_option_button_dropdown');

				                if ( $bbt && !$mobd ) :
				                	include( locate_template('buttons/sidebar_btn_product.php' ) ); 
				                elseif ($bbt && $mobd ) : 
				                	include( locate_template('buttons/sidebar_mobd_product.php' ) );
				                endif;
				            endif;
				        endwhile;?>

				        <script>
				        	!(function($){
				        		$(function(){
				        			var $element = $('#fixed-on-mobile-productpage');
				        			var offset   = $element.offset().top;

				        			if ( $(window).width() < 768 ) {
				        				$(window).on('scroll', function(){

				        					if ( $(this).scrollTop() > offset ) {
				        						$element.addClass('fixed');
				        					} else {
				        						$element.removeClass('fixed');
				        					}
				        				});
				        			}
				        		});
				        	})(jQuery);
				        </script>
					</div>
				<?php endif; ?>

	            <div class="<?php if ( 'content-sidebar' == $site_layout ): ?>col-sm-8<?php elseif( 'full-width-content' == $site_layout ): ?>col-sm-12<?php endif; ?> left-col">
					<?php get_template_part( 'page-templates/product/product-content' ); ?>
				</div>

				<?php if ( 'content-sidebar' == $site_layout ): ?>
                	<div class="col-sm-4 right-col<?php if( get_field('hero_area') ): echo " bear-banner"; else: echo " skip-banner"; endif;?>">
	            		<?php get_template_part( 'page-templates/product/product-sidebar' ); ?>
	            	</div>
	            <?php endif; ?>

			</div>
		</div>
	</section>
	
<?php }

remove_action('genesis_sidebar', 'genesis_do_sidebar');
genesis();