<?php

add_action('admin_menu', 'themeoptions_admin_menu'); //action to display the menu
function themeoptions_admin_menu() {
    add_theme_page('spectrum styles', 'Spectrum styles', 'read', 'color_picker_option', 'color_picker_option_page');
}


function color_picker_option_page()
{
    /*This should normally go into a seperate function to provide default values for when the theme is just activated*/

    $wbgc = get_option('wbgc');
    if (empty($wbgc) || $wbgc == '') {
        add_option('wbgc', 'rgba(255,255,255,1)');
    }

    $ahabgc = get_option('ahabgc');
    if (empty($ahabgc) || $ahabgc == '') {
        add_option('ahabgc', 'rgba(255,255,255,1)');
    }

    $hbgc = get_option('hbgc');
    if (empty($hbgc) || $hbgc == '') {
        add_option('hbgc', 'rgba(24,68,104,1)');
    }

    $smbg = get_option('smbg');
    if (empty($smbg) || $smbg == '') {
        add_option('smbg', 'rgba(187,173,154,1)');
    }

    $pmsbgc = get_option('pmsbgc');
    if (empty($pmsbgc) || $pmsbgc == '') {
        add_option('pmsbgc', 'rgba(24,68,104,1)');
    }

    $mnhctabgc = get_option('mnhctabgc');
    if (empty($mnhctabgc) || $mnhctabgc == '') {
        add_option('mnhctabgc', 'rgba(24,68,104,1)');
    }

    $bwsmbgc = get_option('bwsmbgc');
    if (empty($bwsmbgc) || $bwsmbgc == '') {
        add_option('bwsmbgc', 'rgba(24,68,104,1)');
    }



    $smsbgc = get_option('smsbgc');
    if (empty($smsbgc) || $smsbgc == '') {
        add_option('smsbgc', 'rgba(24,68,104,1)');
    }

    $mtbbgc = get_option('mtbbgc');
    if (empty($mtbbgc) || $mtbbgc == '') {
        add_option('mtbbgc', 'rgba(116,172,223,.8)');
    }


    $mtbhbgc = get_option('mtbhbgc');
    if (empty($mtbhbgc) || $mtbhbgc == '') {
        add_option('mtbhbgc', 'rgba(116,172,223,.3)');
    }

    $himgt = get_option('himgt');
    if (empty($himgt) || $himgt == '') {
        add_option('himgt', 'rgba(116,172,223,.8)');
    }

    $timgt = get_option('timgt');
    if (empty($timgt) || $timgt == '') {
        add_option('timgt', 'rgba(116,172,223,.8)');
    }

    $htbgc = get_option('htbgc');
    if (empty($htbgc) || $htbgc == '') {
        add_option('htbgc', 'rgba(12,50,79,.8)');
    }

    $hcbgc = get_option('hcbgc');
    if (empty($hcbgc) || $hcbgc == '') {
        add_option('hcbgc', 'rgba(116,172,223,.8)');
    }

    $hctabgc = get_option('hctabgc');
    if (empty($hctabgc) || $hctabgc == '') {
        add_option('hctabgc', 'rgba(194,39,47,1)');
    }

    $sctabgc = get_option('sctabgc');
    if (empty($sctabgc) || $sctabgc == '') {
        add_option('sctabgc', 'rgba(194,39,47,1)');
    }

    $podfbgc = get_option('podfbgc');
    if (empty($podfbgc) || $podfbgc == '') {
        add_option('podfbgc', 'rgba(116,172,223,1)');
    }

    $podtbgc = get_option('podtbgc');
    if (empty($podtbgc) || $podtbgc == '') {
        add_option('podtbgc', 'rgba(243,245,246,1)');
    }

    $ftabgc = get_option('ftabgc');
    if (empty($ftabgc) || $ftabgc == '') {
        add_option('ftabgc', 'rgba(194,39,47,1)');
    }
    $fbsbbgc = get_option('fbsbbgc');
    if (empty($fbsbbgc) || $fbsbbgc == '') {
        add_option('fbsbbgc', 'rgba(194,39,47,1)');
    }
    $eabgc = get_option('eabgc');
    if (empty($eabgc) || $eabgc == '') {
        add_option('eabgc', 'rgba(51,137,215,1)');
    }
    $cabgc = get_option('cabgc');
    if (empty($cabgc) || $cabgc == '') {
        add_option('cabgc', 'rgba(255,255,255,1)');
    }

    $facbgc = get_option('facbgc');
    if (empty($facbgc) || $facbgc == '') {
        add_option('facbgc', 'rgba(243,245,246,1)');
    }

    $ccbgc = get_option('ccbgc');
    if (empty($ccbgc) || $ccbgc == '') {
        add_option('ccbgc', 'rgba(255,255,255,1)');
    }

    $cctabgc = get_option('cctabgc');
    if (empty($cctabgc) || $cctabgc == '') {
        add_option('cctabgc', 'rgba(238,240,242,1)');
    }

    $scbgc = get_option('scbgc');
    if (empty($scbgc) || $scbgc == '') {
        add_option('scbgc', 'rgba(234,243,250,1)');
    }

    $tlbb = get_option('tlbb');
    if (empty($tlbb) || $tlbb == '') {
        add_option('tlbb', 'rgba(70,117,206,1)');
    }

    $fbgc = get_option('fbgc');
    if (empty($fbgc) || $fbgc == '') {
        add_option('fbgc', 'rgba(116,172,223,1)');
    }

    /*The admin page*/
    if ( isset($_POST['update_options'])) { color_picker_option_update(); }
    ?>
    <div class="wrap">
        <div id="icon-themes" class="icon32"><br /></div>
        <h2>Spectrum Color picker Options</h2>

        <form method="POST" action="">
            <table class="widefat color_picker_options">
                <thead><tr><th colspan="2">&nbsp;</th></tr></thead>
                <tbody>
                <tr>
                    <td colspan="2"><h3>Dev Mode</h3></td>
                </tr>
                <tr valign="top">
                    <th width="200px" scope="row">On</th>
                    <td>
                        <input name="spctrmdev" type="checkbox" id="spctrmdev" value="dvn" <?php checked( 'dvn', get_option( 'spctrmdev' ) ); ?> />
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><h3>Base</h3></td>
                </tr>
                <tr valign="top">
                    <th width="200px" scope="row">Wrapper Background</th>
                    <td>
                        <input type="text" id="wbgc" value="<?php if((get_option('wbgc')) != ''): echo get_option('wbgc'); else: echo 'rgba(255,255,255,1)'; endif; ?>" name="color_picker_wbgc" />
                        <div id="color_picker_wbgc"></div>
                    </td>
                </tr>
                <tr valign="top">
                    <th width="200px" scope="row">Wrapper Box-shadow</th>
                    <td>
                        <input name="scbxshdw" type="checkbox" id="scbxshdw" value="wbxshdw" <?php checked( 'wbxshdw', get_option( 'scbxshdw' ) ); ?> />
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><h3>Search Form</h3></td>
                </tr>
                <tr valign="top">
                    <th width="200px" scope="row">Above Header Area Background</th>
                    <td>
                        <input type="text" id="ahabgc" value="<?php if((get_option('ahabgc')) != ''): echo get_option('ahabgc'); else: echo 'rgba(255,255,255,1)'; endif; ?>" name="color_picker_ahabgc" />
                        <div id="color_picker_ahabgc"></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><h3>Header</h3></td>
                </tr>
                <tr valign="top">
                    <th width="200px" scope="row">Header Background</th>
                    <td>
                        <input type="text" id="hbgc" value="<?php if((get_option('hbgc')) != ''): echo get_option('hbgc'); else: echo 'rgba(24,68,104,1)'; endif; ?>" name="color_picker_hbgc" />
                        <div id="color_picker_hbgc"></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><h3>Secondary Menu</h3></td>
                </tr>
                <tr valign="top">
                    <th width="200px" scope="row">Secondary Menu Background</th>
                    <td>
                        <input type="text" id="smbg" value="<?php if((get_option('smbg')) != ''): echo get_option('smbg'); else: echo 'rgba(187,173,154,1)'; endif; ?>" name="color_picker_smbg" />
                        <div id="color_picker_smbg"></div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2"><h3>Main nav</h3></td>
                </tr>

                <tr valign="top">
                    <th width="200px" scope="row">Submenu item Background</th>
                    <td>
                        <input type="text" id="pmsbgc" value="<?php if((get_option('pmsbgc')) != ''): echo get_option('pmsbgc'); else: echo 'rgba(24,68,104,1)'; endif; ?>" name="color_picker_pmsbgc" />
                        <div id="color_picker_pmsbgc"></div>
                    </td>
                </tr>
                <tr valign="top">
                    <th width="200px" scope="row">CTA Button Background</th>
                    <td>
                        <input type="text" id="mnhctabgc" value="<?php if((get_option('mnhctabgc')) != ''): echo get_option('mnhctabgc'); else: echo 'rgba(24,68,104,1)'; endif; ?>" name="color_picker_mnhctabgc" />
                        <div id="color_picker_mnhctabgc"></div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2"><h3>Secondary nav</h3></td>
                </tr>
                <tr valign="top">
                    <th width="200px" scope="row">Bar wrapper Background</th>
                    <td>
                        <input type="text" id="bwsmbgc" value="<?php if((get_option('bwsmbgc')) != ''): echo get_option('bwsmbgc'); else: echo 'rgba(24,68,104,1)'; endif; ?>" name="color_picker_bwsmbgc" />
                        <div id="color_picker_bwsmbgc"></div>
                    </td>
                </tr>

                <tr valign="top">
                    <th width="200px" scope="row">Submenu item Background</th>
                    <td>
                        <input type="text" id="smsbgc" value="<?php if((get_option('smsbgc')) != ''): echo get_option('smsbgc'); else: echo 'rgba(24,68,104,1)'; endif; ?>" name="color_picker_smsbgc" />
                        <div id="color_picker_smsbgc"></div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2"><h3>Mobile nav</h3></td>
                </tr>
                <tr valign="top">
                    <th width="200px" scope="row">Toggle button Background</th>
                    <td>
                        <input type="text" id="mtbbgc" value="<?php if((get_option('mtbbgc')) != ''): echo get_option('mtbbgc'); else: echo 'rgba(116,172,223,.8)'; endif; ?>" name="color_picker_mtbbgc" />
                        <div id="color_picker_mtbbgc"></div>
                    </td>
                </tr>
                <tr valign="top">
                    <th width="200px" scope="row">Toggle button hover Background</th>
                    <td>
                        <input type="text" id="mtbhbgc" value="<?php if((get_option('mtbhbgc')) != ''): echo get_option('mtbhbgc'); else: echo 'rgba(116,172,223,.3)'; endif; ?>" name="color_picker_mtbhbgc" />
                        <div id="color_picker_mtbhbgc"></div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2"><h3>CTA</h3></td>
                </tr>
                <tr valign="top">
                    <th width="200px" scope="row">Hero CTA Button Background</th>
                    <td>
                        <input type="text" id="hctabgc" value="<?php if((get_option('hctabgc')) != ''): echo get_option('hctabgc'); else: echo 'rgba(194,39,47,1)'; endif; ?>" name="color_picker_hctabgc" />
                        <div id="color_picker_hctabgc"></div>
                    </td>
                </tr>
                <tr valign="top">
                    <th width="200px" scope="row">Hero CTA Button background fill</th>
                    <td>
                        <input name="hctabgcfill" type="checkbox" id="hctabgcfill" value="foobar" <?php checked( 'foobar', get_option( 'hctabgcfill' ) ); ?> />
                    </td>
                </tr>
                <tr valign="top">
                    <th width="200px" scope="row">Content CTA Button Background</th>
                    <td>
                        <input type="text" id="sctabgc" value="<?php if((get_option('sctabgc')) != ''): echo get_option('sctabgc'); else: echo 'rgba(194,39,47,1)'; endif; ?>" name="color_picker_sctabgc" />
                        <div id="color_picker_sctabgc"></div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2"><h3>Hero Area</h3></td>
                </tr>
                <tr valign="top">
                    <th width="200px" scope="row">Hero Image Tint</th>
                    <td>
                        <input type="text" id="himgt" value="<?php if((get_option('himgt')) != ''): echo get_option('himgt'); else: echo 'rgba(116,172,223,.8)'; endif; ?>" name="color_picker_himgt" />
                        <div id="color_picker_himgt"></div>
                    </td>
                </tr>
                <tr valign="top">
                    <th width="200px" scope="row">Hero Title Background</th>
                    <td>
                        <input type="text" id="htbgc" value="<?php if((get_option('htbgc')) != ''): echo get_option('htbgc'); else: echo 'rgba(12,50,79,.8)'; endif; ?>" name="color_picker_htbgc" />
                        <div id="color_picker_htbgc"></div>
                    </td>
                </tr>
                <tr valign="top">
                    <th width="200px" scope="row">Hero Content Background</th>
                    <td>
                        <input type="text" id="hcbgc" value="<?php if((get_option('hcbgc')) != ''): echo get_option('hcbgc'); else: echo 'rgba(116,172,223,.8)'; endif; ?>" name="color_picker_hcbgc" />
                        <div id="color_picker_hcbgc"></div>
                    </td>
                </tr>
                <tr valign="top">
                    <th width="200px" scope="row">Point of Difference Background on Front page</th>
                    <td>
                        <input type="text" id="podfbgc" value="<?php if((get_option('podfbgc')) != ''): echo get_option('podfbgc'); else: echo 'rgba(116,172,223,1)'; endif; ?>" name="color_picker_podfbgc" />
                        <div id="color_picker_podfbgc"></div>
                    </td>
                </tr>
                <tr valign="top">
                    <th width="200px" scope="row">Secondary Menu Background on Tour pages</th>
                    <td>
                        <input type="text" id="podtbgc" value="<?php if((get_option('podtbgc')) != ''): echo get_option('podtbgc'); else: echo 'rgba(243,245,246,1)'; endif; ?>" name="color_picker_podtbgc" />
                        <div id="color_picker_podtbgc"></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><h3>Button Style (Tiles + Forms)</h3></td>
                </tr>
                <tr valign="top">
                    <th width="200px" scope="row">Button background</th>
                    <td>
                        <input type="text" id="ftabgc" value="<?php if((get_option('ftabgc')) != ''): echo get_option('ftabgc'); else: echo 'rgba(194,39,47,1)'; endif; ?>" name="color_picker_ftabgc" />
                        <div id="color_picker_ftabgc"></div>
                    </td>
                </tr>
                <tr valign="top">
                    <th width="200px" scope="row">Button background fill</th>
                    <td>
                        <input name="ftabgcfill" type="checkbox" id="ftabgcfill" value="foobar" <?php checked( 'foobar', get_option( 'ftabgcfill' ) ); ?> />
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><h3>Button Style (Fluid Boxes)</h3></td>
                </tr>
                <tr valign="top">
                    <th width="200px" scope="row">Button background</th>
                    <td>
                        <input type="text" id="fbsbbgc" value="<?php if((get_option('fbsbbgc')) != ''): echo get_option('fbsbbgc'); else: echo 'rgba(194,39,47,1)'; endif; ?>" name="color_picker_fbsbbgc" />
                        <div id="color_picker_fbsbbgc"></div>
                    </td>
                </tr>
                <tr valign="top">
                    <th width="200px" scope="row">Button background fill</th>
                    <td>
                        <input name="fbsbbgcfill" type="checkbox" id="fbsbbgcfill" value="fbsfoobar" <?php checked( 'fbsfoobar', get_option( 'fbsbbgcfill' ) ); ?> />
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><h3>Elements Accent</h3></td>
                </tr>
                <tr valign="top">
                    <th width="200px" scope="row">Background color</th>
                    <td>
                        <input type="text" id="eabgc" value="<?php if((get_option('eabgc')) != ''): echo get_option('eabgc'); else: echo 'rgba(51,137,215,1)'; endif; ?>" name="color_picker_eabgc" />
                        <div id="color_picker_eabgc"></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><h3>Content</h3></td>
                </tr>
                <tr valign="top">
                    <th width="200px" scope="row">Content Area Background</th>
                    <td>
                        <input type="text" id="cabgc" value="<?php if((get_option('cabgc')) != ''): echo get_option('cabgc'); else: echo 'rgba(255,255,255,1)'; endif; ?>" name="color_picker_cabgc" />
                        <div id="color_picker_cabgc"></div>
                    </td>
                </tr>
                <tr valign="top">
                    <th width="200px" scope="row">Content Containers Background</th>
                    <td>
                        <input type="text" id="ccbgc" value="<?php if((get_option('ccbgc')) != ''): echo get_option('ccbgc'); else: echo 'rgba(255,255,255,1)'; endif; ?>" name="color_picker_ccbgc" />
                        <div id="color_picker_ccbgc"></div>
                    </td>
                </tr>
                <tr valign="top">
                    <th width="200px" scope="row">Featured Area Container Background</th>
                    <td>
                        <input type="text" id="facbgc" value="<?php if((get_option('facbgc')) != ''): echo get_option('facbgc'); else: echo 'rgba(243,245,246,1)'; endif; ?>" name="color_picker_facbgc" />
                        <div id="color_picker_facbgc"></div>
                    </td>
                </tr>
                <tr valign="top">
                    <th width="200px" scope="row">Featured Area Container Box-shadow</th>
                    <td>
                        <input name="facbgcbs" type="checkbox" id="facbgcbs" value="bxshdw" <?php checked( 'bxshdw', get_option( 'facbgcbs' ) ); ?> />
                    </td>
                </tr>
                <tr valign="top">
                    <th width="200px" scope="row">Tile Image Tint</th>
                    <td>
                        <input type="text" id="timgt" value="<?php if((get_option('timgt')) != ''): echo get_option('timgt'); else: echo 'rgba(116,172,223,.8)'; endif; ?>" name="color_picker_timgt" />
                        <div id="color_picker_timgt"></div>
                    </td>
                </tr>
                <tr valign="top">
                    <th width="200px" scope="row">CTA Container Background</th>
                    <td>
                        <input type="text" id="cctabgc" value="<?php if((get_option('cctabgc')) != ''): echo get_option('cctabgc'); else: echo 'rgba(238,240,242,1)'; endif; ?>" name="color_picker_cctabgc" />
                        <div id="color_picker_cctabgc"></div>
                    </td>
                </tr>
                <tr valign="top">
                    <th width="200px" scope="row">Subscribe Container Background</th>
                    <td>
                        <input type="text" id="scbgc" value="<?php if((get_option('scbgc')) != ''): echo get_option('scbgc'); else: echo 'rgba(234,243,250,1)'; endif; ?>" name="color_picker_scbgc" />
                        <div id="color_picker_scbgc"></div>
                    </td>
                </tr>
                <tr valign="top">
                    <th width="200px" scope="row">Trip List Item Background</th>
                    <td>
                        <input type="text" id="tlib" value="<?php if((get_option('tlib')) != ''): echo get_option('tlib'); else: echo 'rgba(245,245,245,1)'; endif; ?>" name="color_picker_tlib" />
                        <div id="color_picker_tlib"></div>
                    </td>
                </tr>
                <tr valign="top">
                    <th width="200px" scope="row">Fluid Box Background-Color Variation-1</th>
                    <td>
                        <input type="text" id="fbbcv1" value="<?php if((get_option('fbbcv1')) != ''): echo get_option('fbbcv1'); else: echo 'rgba(255,255,255,1)'; endif; ?>" name="color_picker_fbbcv1" />
                        <div id="color_picker_fbbcv1"></div>
                    </td>
                </tr>
                <tr valign="top">
                    <th width="200px" scope="row">Fluid Box Background-Color Variation-2</th>
                    <td>
                        <input type="text" id="fbbcv2" value="<?php if((get_option('fbbcv2')) != ''): echo get_option('fbbcv2'); else: echo 'rgba(255,255,255,1)'; endif; ?>" name="color_picker_fbbcv2" />
                        <div id="color_picker_fbbcv2"></div>
                    </td>
                </tr>
                <tr valign="top">
                    <th width="200px" scope="row">Trip Link Button Background</th>
                    <td>
                        <input type="text" id="tlbb" value="<?php if((get_option('tlbb')) != ''): echo get_option('tlbb'); else: echo 'rgba(70,117,206,1)'; endif; ?>" name="color_picker_tlbb" />
                        <div id="color_picker_tlbb"></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><h3>Footer</h3></td>
                </tr>
                <tr valign="top">
                    <th width="200px" scope="row">Footer Background</th>
                    <td>
                        <input type="text" id="fbgc" value="<?php if((get_option('fbgc')) != ''): echo get_option('fbgc'); else: echo 'rgba(116,172,223,1)'; endif; ?>" name="color_picker_fbgc" />
                        <div id="color_picker_fbgc"></div>
                    </td>
                </tr>

                </tbody>

                <tfoot><tr><th>&nbsp;</th><th>&nbsp;</th></tr></tfoot>
            </table>
            <p><input type="submit" name="update_options" value="Update Options" class="button-primary" /></p>
        </form>
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function($){

            $("#ahabgc, #wbgc, #hbgc, #smbg, #pmsbgc, #mnhctabgc, #bwsmbgc, #smsbgc, #mtbbgc, #mtbhbgc, #himgt, #timgt, #htbgc, #hcbgc, #hctabgc, #sctabgc, #podfbgc, #podtbgc, #ftabgc, #fbsbbgc, #eabgc, #cabgc, #facbgc, #ccbgc, #cctabgc, #scbgc, #tlib, #fbbcv1, #fbbcv2, #tlbb, #fbgc").spectrum({
                showInput: true,
                showPalette: true,
                palette:[["transparent"]],
                showInitial: true,
                allowEmpty: true,
                showAlpha: true,
                preferredFormat: "rgb"
            });


        });
    </script>
    <?php
}


function color_picker_option_update()
{
    if(current_user_can('edit_themes')){
        update_option('ahabgc', esc_html($_POST['color_picker_ahabgc']));
        update_option('wbgc', esc_html($_POST['color_picker_wbgc']));
        update_option('hbgc', esc_html($_POST['color_picker_hbgc']));
        update_option('smbg', esc_html($_POST['color_picker_smbg']));

        update_option('pmsbgc', esc_html($_POST['color_picker_pmsbgc']));
        update_option('mnhctabgc', esc_html($_POST['color_picker_mnhctabgc']));
        update_option('bwsmbgc', esc_html($_POST['color_picker_bwsmbgc']));
        update_option('smsbgc', esc_html($_POST['color_picker_smsbgc']));

        update_option('mtbbgc', esc_html($_POST['color_picker_mtbbgc']));
        update_option('mtbhbgc', esc_html($_POST['color_picker_mtbhbgc']));

        update_option('himgt', esc_html($_POST['color_picker_himgt']));
        update_option('timgt', esc_html($_POST['color_picker_timgt']));
        update_option('htbgc', esc_html($_POST['color_picker_htbgc']));
        update_option('hcbgc', esc_html($_POST['color_picker_hcbgc']));

        update_option('hctabgc', esc_html($_POST['color_picker_hctabgc']));

        $hcta_tweak = $_POST['hctabgcfill'] ? $_POST['hctabgcfill'] : '';
        update_option('hctabgcfill', esc_html($hcta_tweak));

        update_option('sctabgc', esc_html($_POST['color_picker_sctabgc']));

        update_option('podfbgc', esc_html($_POST['color_picker_podfbgc']));
        update_option('podtbgc', esc_html($_POST['color_picker_podtbgc']));

        update_option('ftabgc', esc_html($_POST['color_picker_ftabgc']));
        update_option('fbsbbgc', esc_html($_POST['color_picker_fbsbbgc']));
        update_option('eabgc', esc_html($_POST['color_picker_eabgc']));

        $shdw = $_POST['facbgcbs'] ?: '';
        update_option('facbgcbs', esc_html($shdw));

        $scshdw = $_POST['scbxshdw'] ?: '';
        update_option('scbxshdw', esc_html($scshdw));

        $devmode = $_POST['spctrmdev'] ?: '';
        update_option('spctrmdev', esc_html($devmode));

        $tweak = $_POST['ftabgcfill'] ?: '';
        update_option('ftabgcfill', esc_html($tweak));

        $fbstweak = $_POST['fbsbbgcfill'] ?: '';
        update_option('fbsbbgcfill', esc_html($fbstweak));

        update_option('cabgc', esc_html($_POST['color_picker_cabgc']));
        update_option('facbgc', esc_html($_POST['color_picker_facbgc']));
        update_option('ccbgc', esc_html($_POST['color_picker_ccbgc']));
        update_option('cctabgc', esc_html($_POST['color_picker_cctabgc']));

        update_option('scbgc', esc_html($_POST['color_picker_scbgc']));
        update_option('tlib', esc_html($_POST['color_picker_tlib']));
        update_option('fbbcv1', esc_html($_POST['color_picker_fbbcv1']));
        update_option('fbbcv2', esc_html($_POST['color_picker_fbbcv2']));
        update_option('tlbb', esc_html($_POST['color_picker_tlbb']));
        update_option('fbgc', esc_html($_POST['color_picker_fbgc']));
    }
}
