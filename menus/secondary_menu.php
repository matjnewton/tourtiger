<?php
    //$phone_number = get_field('phone_number','option');
    $motto = get_field('motto', 'option');    
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
            <?php include(locate_template('menus/right_secondary.php' )); ?>
            </div>
        </div>
    </div><!-- .row-->
