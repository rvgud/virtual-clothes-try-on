<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://www.live.dugudlabs.com/
 * @since      1.0.0
 *
 * @package    Virtual_Clothes_Try_On
 * @subpackage Virtual_Clothes_Try_On/public/partials
 */
?>
<div class="container">
    <div class="dressfit_modal fade"  data-backdrop="false" style="z-index: 10000000;margin-top: 45px;" id="TryOnModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="dressfit_modal-dialog" id="SpecdFit_Dialog" style=""  role="document">
            <div class="dressfit_modal-content try_on_popup" style="padding:0px;overflow-y: inherit;right: 0px;    position: inherit;">
                <div class="dressfit_modal-body" style="padding: 0px;">
                    <div class="row" id="dressfit_image_row">
                        <div class="dressfit_col-md-2 dressfit_col-lg-2" id="desktop-action-row">
                            <div id="plus_div" class="tooltipdiv">
                                <button id="fa_plus" type="button" class="fa_btns" onclick="zoom_in();" ontouchstart="zoom_in()">
                                    <span  id="plus" class="trans fa fa-expand"data-placement="top"></span>
                                </button>
                                <span class="tooltiptextplus">Zoom in dress</span>
                            </div>
                            <div id="minus_div" class="tooltipdiv">
                                <button id="fa_minus" type="button" class="fa_btns" onclick="zoom_out();" ontouchstart="zoom_in()">
                                    <span id="plus" class="trans fa fa-compress"data-placement="top"></span>
                                </button>
                                <span class="tooltiptextminus">Zoom out dress</span>
                            </div>
                            <div id="right_div" class="tooltipdiv">
                                <button id="fa_right" type="button" class="fa_btns" onclick="rotate_right()" ontouchstart="rotate_right()">
                                    <span  id="right" class="fa trans  fa-repeat"data-placement="top"></span>
                                </button>
                                <span class="tooltiptextright">Rotate dress clock wise</span>
                            </div>
                            <div id="left_div" class="tooltipdiv">
                                <button id="fa_left" type="button" class="fa_btns" onclick="rotate_left()" >
                                    <span  id="left" class="fa trans  fa-rotate-left"data-placement="top"></span>
                                </button>
                                <span class="tooltiptextleft">Rotate dress anti-clock wise</span>
                            </div>
                            <div id="fa_360_div" class="tooltipdiv">
                                <button id="fa_360" type="button" class="fa_btns" onclick="rotate_360()" ontouchstart="rotate_360()">
                                    <span id="refresh" class="trans fa fa-refresh"data-placement="top"></span>
                                </button>
                                <span class="tooltiptextfa360">Rotate dress 360 degree</span>
                            </div>
                            <div id="close_div" class="tooltipdiv">
                                <button type="button" class="fa_btns" data-dismiss="dressfit_modal">
                                    <span id="close" class="trans fa fa-times-circle-o"data-placement="top"></span>
                                </button>
                                <span class="tooltiptextclose">Close Pop Up</span>
                            </div>
                            
                        </div>
                        <div class="dressfit_col-md-10 dressfit_col-lg-10" id="dressfit_img_div">
                            <?php if($dressFitType=="top"){ ?>
                            <img src="<?php echo plugin_dir_url(__FILE__).'images/MenTshirt.png'  ?>" id="imageCanvas" alt="virtual try on wordpress">
                            <div id="tryonimagediv" class="tshirtimagediv">
                                <img id="galssimage" src="" class="galssimageclass img-responsive img-thumbnail fixed_images">
                                <span id ="tooltiptextdrag" class="tooltiptextdrag">
                                <svg height="20" width="20" class="blinking">
                                    <circle cx="10" cy="10" r="6" fill="white" /> 
                                </svg> 
                                Dress is draggable and resizable from bottom right corner.
                            </span>
                            </div>
                            
                            <?php }
                             else {?>
                            <img src="<?php echo plugin_dir_url(__FILE__).'images/MenJeans.png' ?>" id="imageCanvas" alt="virtual try on wordpress">
                            <div id="tryonimagediv" class="jeansimagediv">
                                <img id="galssimage" src="" class="galssimageclass img-responsive img-thumbnail fixed_images">
                                <span id ="tooltiptextdrag" class="tooltiptextdrag">
                                <svg height="20" width="20" class="blinking">
                                    <circle cx="10" cy="10" r="6" fill="white" /> 
                                </svg> 
                                Dress is draggable and resizable from bottom right corner.
                            </span>
                            </div>
                            
                            <?php } ?>
                            <div id="rotate_div" data-html2canvas-ignore class="row d-md-none d-lg-none" style="margin: 0;">
                                <div class="dressfit_col-md-12 dressfit_col-lg-12" style="margin-bottom: 9px;font-size: x-large;text-align: center; background-color: #367ab7;color: white;" ontouchstart="rotate_image_canvas();">
                                    <?php echo $dressfit_plati_words_lng["Rotate Body Image"]; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dressfit_modal-footer" style="padding-top: 0px;"> 
                    <div class="" style="text-align: center;">
                        <div class="row" id="mobile-action-row">
                            <div class="dressfit_col-sm-12 dressfit_col-sm-12">
                            <input id="upload_btn"
                                        class="btn btn-secondary"
                                        style="display:none"
                                        type="file">
                                <span id="upload" onclick='j(".demoImage").removeClass("active"); j("#imgdiv").addClass("active");j("#upload_btn").click();' class="trans fa fa-picture-o" data-placement="top"></span>
                                <span id="plus" class="trans fa fa-expand" data-placement="top" ontouchstart="zoom_in()" ></span>
                                <span id="minus" class="trans fa fa-compress" data-placement="top" ontouchstart="zoom_out()"></span>
                                <span id="right" class="trans fa fa-repeat" data-placement="top" ontouchstart="rotate_right()"></span>
                                <span id="left" class="trans fa fa-rotate-left" data-placement="top" ontouchstart="rotate_left()"></span>
                                <span id="download" class="trans fa fa-download" data-placement="top" ontouchstart="download_dressfit_platinum()" ></span>
                                <span id="close" class="trans fa fa-times-circle-o" data-placement="top" data-dismiss="dressfit_modal"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>