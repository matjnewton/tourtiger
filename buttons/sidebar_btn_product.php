<?php
/**
 * Single product Component: Sidebar button
 */

include( locate_template( 'includes/integrate_vars.php' ) );


$check_user_id_xola                 = get_field( 'check_user_id_xola', 'options' );
$integrate_atlasx_with_this_website = get_field( 'integrate_atlasx_with_this_website', 'options' );

if ( $integrate_xola && ( $button_type == 'Use as third party integration Link' ) ) :
    if( $third_party == "xola-single-item" ) :

        $xsi        = explode(",",$bbl);
        $seller     = $xsi[0];
        $experience = $xsi[1];
        $version    = $xsi[2];
        ?>
        
        <div 
            class="book-btn2-product xola-checkout xola-custom _book-btn2" 
            data-seller="<?=$seller;?>" 
            data-experience="<?=$experience;?>" 
            data-version="<?=$version;?>">

            <div class="book-btn2-product-title">
                <span><?=$bbt;?></span>
                <i class="fa fa-angle-right"></i>
            </div> 
        </div>
                                
        <?php 
    elseif ( $third_party == "xola-multi-item" ) : 
        ?>

        <div 
            class="book-btn2-product xola-checkout xola-custom _book-btn2" 
            data-button-id="<?php echo $bbl ? $bbl : ''; ?>">

            <div class="book-btn2-product-title">
                <span><?=$bbt;?></span>
                <i class="fa fa-angle-right"></i>
            </div> 
        </div>
         
        <?php 
    else: 
        $dz_btn_classes  = 'xola-custom _book-btn2 book-btn2-product';
        $dz_btn_classes .= $third_party ? " {$third_party}" : '';  
        ?>

        <div 
            id="<?php echo $bbl ? $bbl : ''; ?>" class="<?=$dz_btn_classes;?>">
            <div class="book-btn2-product-title">
                <span><?=$bbt;?></span>
                <i class="fa fa-angle-right"></i>
            </div> 
        </div>

        <?php 
    endif; 
elseif ( $integrate_peek && ( $button_type == 'Use as third party integration Link' ) ) : 
    ?>
    
    <a 
        href="http://www.peek.com/purchase/activity/widget/<?=$bbl;?>" 
        class="peek-book-button-flat _book-btn2 book-btn2-product" 
        data-purchase-type="activity" 
        data-button-text="" 
        data-activity-gid="<?=$bbl;?>" 
        style="border-radius:0;">

        <div class="book-btn2-product-title">
            <span><?=$bbt;?></span>
            <i class="fa fa-angle-right"></i>
        </div> 
    </a>

    <?php 
elseif( $integrate_fareharbor && ( $button_type == 'Use as third party integration Link' ) ) : 

    $dz_btn_href = '#';
    $dz_btn_onclick = '';

    if ( $fareharbor_shortname ) : 

        /**
         * Generate href
         */
        $dz_btn_href = 'https://fareharbor.com/'.$fareharbor_shortname.'/items/';

        if ( $third_party == 'all-availability' ) : 
            $dz_btn_href .= 'calendar/';
        elseif ( $third_party == 'tour-item' ) : 
            $dz_btn_href .= $bbl.'/'; 
        elseif ( $third_party == 'tour-item-calendar' ) : 
            $dz_btn_href .= $bbl.'/calendar/'; 
        endif; 

        /**
         * Generate onclick action
         */
        $dz_btn_onclick .= "FH.open({ shortname: '{$fareharbor_shortname}',";

        if ( $third_party == 'all-availability' ) : 
            $dz_btn_onclick .= "view: 'all-availability',";
        elseif ( $third_party == 'tour-item' || $third_party == 'tour-item-calendar' ) : 
            $dz_btn_onclick .= "view: { item: '{$bbl}' },";
        elseif ( !$third_party == 'tour-item-calendar' ) : 
            $dz_btn_onclick .= "fullItems: 'yes'";
        endif;

        $dz_btn_onclick .= "});";
    endif;
    $dz_btn_onclick .= "return false;"; 
    ?>
    
    <a 
        href="<?=$dz_btn_href;?>" 
        onclick="<?=$dz_btn_onclick;?>" 
        class="_book-btn2 book-btn2-product">

        <div class="book-btn2-product-title">
            <span><?=$bbt;?></span>
            <i class="fa fa-angle-right"></i>
        </div> 
    </a>

    <?php 
elseif( $integrate_getinsellout && ( $button_type == 'Use as third party integration Link' ) ) : 

    $data_pn  = $getinsellout_data_pn ? "data-pn='{$getinsellout_data_pn}'" : '';
    $data_url = $getinsellout_data_url ? "data-url='{$getinsellout_data_url}'" : '';
    $data_evt = $getinsellout_data_evt ? "data-evt='{$getinsellout_data_evt}'" : '';
    ?>
    
    <a 
        class="giso_cb giso_btn _book-btn2 book-btn2-product"
        <?=$data_pn;?>
        <?=$data_url;?>
        <?=$data_evt;?>
        href="<?php echo $bbl ? $bbl : ''; ?>">

        <div class="book-btn2-product-title">
            <span><?=$bbt;?></span>
            <i class="fa fa-angle-right"></i>
        </div> 
    </a>

    <?php 
elseif ( $integrate_trekksoft && ( $button_type == 'Use as third party integration Link' ) ) :

    $arr     = explode(",",$bbl);
    $format1 = $arr[0];
    $format2 = $arr[1];
    ?>

    <a 
        href="#" 
        class="book-btn2-product" 
        id="<?php echo $bbl ? 'sbtn_trekksoft_' . $format1 : ''; ?>">

        <div class="book-btn2-product-title">
            <span><?=$bbt;?></span>
            <i class="fa fa-angle-right"></i>
        </div>    
    </a>

    <script>
    // <![CDATA[
    (function() { var button = new TrekkSoft.Embed.Button(); button .setAttrib("target", "fancy") <?php if($third_party == "tour_details"): ?> .setAttrib("entryPoint", "tour_details") .setAttrib("tourId", "<?php echo $format2; ?>") <?php elseif($third_party == "tour_finder"): ?> .setAttrib("entryPoint", "tour_finder")<?php endif;?> .registerOnClick("#<?php if($bbl): echo 'sbtn_trekksoft_' . $format1; endif; ?>"); })();
    // ]]>
    </script>

    <?php 
elseif ( $integrate_rezdy && ( $button_type == 'Use as third party integration Link' ) ) : 
    ?>
    
    <a 
        class="button-booking rezdy rezdy-modal book-btn2-product" 
        href="<?=$bbl;?>">

        <div class="book-btn2-product-title">
            <span><?=$bbt;?></span>
            <i class="fa fa-angle-right"></i>
        </div>
    </a>

    <?php 
elseif ( $integrate_atlasx_with_this_website && ( $button_type == 'Use as third party integration Link' ) ) : 
    ?>

    <div 
        class="book-btn2-product xola-checkout xola-custom _book-btn2" 
        data-seller="<?=$check_user_id_xola;?>" 
        data-version="2">

        <div class="book-btn2-product-title">
            <span><?=$bbt;?></span>
            <i class="fa fa-angle-right"></i>
        </div> 
    </div>

    <?php 
else: 

    $dz_btn_attrs = '';

    if ( $button_type == 'Link to form' ) :
        $dz_btn_attrs .= ' id="scroll_to_form"'; 
        $dz_btn_attrs .= ' data-scroll-nav="100"'; 
    endif;
    
    $dz_btn_attrs .= $button_type == 'Link to form' ? ' href="#"' : " href='{$bbl}'";
    $dz_btn_attrs .= $cta_onclick ? " onclick='{$cta_onclick}'" : '';

    $dz_btn_attrs .= $button_type == 'iframe-popup' ? 'data-iframe-popup="'.$bbl.'"' : '';
    ?>

    <a 
        <?=$dz_btn_attrs;?> 
        class="book-btn2-product">

        <div class="book-btn2-product-title">
            <span><?=$bbt;?></span>
            <i class="fa fa-angle-right"></i>
        </div>
    </a>

    <?php
endif; 
?>