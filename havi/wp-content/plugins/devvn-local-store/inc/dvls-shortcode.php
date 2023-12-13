<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' );?>
<?php
global $dvls_settings;
?>
<div class="dvls_maps_wrap">
    <div class="dvls_maps_container">

        <div class="dvls_maps_row dvls_maps_body">
            <div class="dvls_maps_header_right view-mb">
                <form action="" method="get">
                    <div class="dvls_maps_3col">
                        <div class="dvls_maps_col">
                            <select name="city" id="dvls_city" data-value="">
                                <option value="null"><?php _e('Chọn tỉnh/thành phố','devvn-local-store');?></option>
                            </select>
                        </div>

                        <div class="dvls_maps_col">
                            <select name="district" id="dvls_district" data-value="">
                                <option value="null"><?php _e('Chọn quận/huyện','devvn-local-store');?></option>
                            </select>
                        </div>
                        <div class="dvls_maps_col">
                            <?php wp_nonce_field('dvls_nonce_action','dvls_nonce');?>
                            <input value="<?php _e('Tìm kiếm','devvn-local-store')?>" type="submit" class="dvls-submit"/>
                        </div>
                    </div>
                    <!--<div class="dvls_maps_col">
                                <a href="javascript:void(0);" class="dvls_near_you" title="<?php /*printf(__('Tìm kiếm cửa hàng (<=%s km)','devvn-local-store'),$dvls_settings['radius']);*/?>"><?php /*printf(__('Tìm kiếm cửa hàng (<=%s km)','devvn-local-store'),$dvls_settings['radius']);*/?></a>
                            </div>-->
                </form>
            </div>
            <div class="dvls_maps_sidebar">
                <div class="dvls_maps_header_right view-pc">
                    <form action="" method="get">
                        <div class="dvls_maps_2col">
                            <div class="dvls_maps_col">
                                <select name="city" id="dvls_city" data-value="">
                                    <option value="null"><?php _e('Chọn tỉnh/thành phố','devvn-local-store');?></option>
                                </select>
                            </div>

                            <div class="dvls_maps_col">
                                <select name="district" id="dvls_district" data-value="">
                                    <option value="null"><?php _e('Chọn quận/huyện','devvn-local-store');?></option>
                                </select>
                            </div>
                            <div class="dvls_maps_col">
                                <?php wp_nonce_field('dvls_nonce_action','dvls_nonce');?>
                                <input value="<?php _e('Tìm kiếm','devvn-local-store')?>" type="submit" class="dvls-submit"/>
                            </div>
                        </div>
                        <!--<div class="dvls_maps_col">
                                <a href="javascript:void(0);" class="dvls_near_you" title="<?php /*printf(__('Tìm kiếm cửa hàng (<=%s km)','devvn-local-store'),$dvls_settings['radius']);*/?>"><?php /*printf(__('Tìm kiếm cửa hàng (<=%s km)','devvn-local-store'),$dvls_settings['radius']);*/?></a>
                            </div>-->
                    </form>
                </div>
                <?php do_action('dvls_before_sidebar');?>
                <div class="dvls_maps_sidebar_content">

                    <div class="dvls_result_status"><?php _e('Tổng <strong></strong> chi nhánh','devvn-local-store');?></div>
                    <div class="dvls_result_wrap">
                        <?php _e('Đang tải...','devvn-local-store');?>
                    </div>
                </div>
                <?php do_action('dvls_after_sidebar');?>
            </div>
            <div class="dvls_maps_main">
                <div id="dvls_maps"  data-lat="<?php echo $dvls_settings['lat_default'];?>" data-lng="<?php echo $dvls_settings['lng_default'];?>"></div>
            </div>
            <div id="dvls_fountainG">
                <div id="fountainG_1" class="fountainG"></div>
                <div id="fountainG_2" class="fountainG"></div>
                <div id="fountainG_3" class="fountainG"></div>
                <div id="fountainG_4" class="fountainG"></div>
                <div id="fountainG_5" class="fountainG"></div>
                <div id="fountainG_6" class="fountainG"></div>
                <div id="fountainG_7" class="fountainG"></div>
                <div id="fountainG_8" class="fountainG"></div>
            </div>
        </div>
    </div>
</div>