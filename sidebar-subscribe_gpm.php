<?php
/**
 * Genesis Framework.
 *
 * WARNING: This file is part of the core Genesis Framework. DO NOT edit this file under any circumstances.
 * Please do all modifications in the form of a child theme.
 *
 * @package Genesis\Templates
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://my.studiopress.com/themes/genesis/
 */

//* Output subscribe sidebar structure
?>
<?php
$subscribe_form_embed = get_option( 'options_subscribe_form_embed' );
if($subscribe_form_embed): ?>
<section class="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?php echo do_shortcode($subscribe_form_embed); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>