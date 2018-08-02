<?php
    $motto = get_option( 'options_motto' );    
?>
    <div class="row">
        <div class="col-sm-6 hidden-xs">
            <div class="above-split-bar">
            <span class="motto">
        <?php if($motto): echo $motto; endif; ?>
            </span>
            </div>  
        </div>
        <div class="col-sm-6">
            <div class="above-split-bar">        
            <?php include(locate_template('menus/right_secondary_gpm.php' )); ?>
            </div>
        </div>
    </div><!-- .row-->
