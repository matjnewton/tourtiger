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