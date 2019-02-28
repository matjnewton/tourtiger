<?php
    $motto = get_option( 'options_motto' );
    $call_on_mobile = get_field( 'motto_mobile', 'option' );
?>
<div class="row">

    <div class="col-xs-12 col-sm-6 <?php if ($call_on_mobile==false): ?>hidden-xs<?php endif;?>">
            <div class="above-split-bar" style="text-align: left;">
                <?php echo $motto;?>
            </div>
    </div>

        <div class="col-xs-12 col-sm-6">
            <div class="above-split-bar">
            <?php include(locate_template('menus/right_secondary_gpm.php' )); ?>
            </div>
        </div>
    </div><!-- .row-->
