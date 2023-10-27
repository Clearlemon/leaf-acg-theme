<?php
function leaf_close_home_foot_assets()
{
    $leaf_close_home_foot_assets = _leaf('leaf_close_home_foot_assets');
    if ($leaf_close_home_foot_assets == 'leaf_article_succinct_foot') {
        $foot_succinct = _leaf('foot_succinct');
        $foot_succinct_icpnumber = isset($foot_succinct['foot_succinct_icpnumber']) ? $foot_succinct['foot_succinct_icpnumber'] : '';
        $foot_succinct_moe_icpnumber = isset($foot_succinct['foot_succinct_moe_icpnumber']) ? $foot_succinct['foot_succinct_moe_icpnumber'] : '';
        $foot_succinct_textarea = isset($foot_succinct['foot_succinct_textarea']) ? $foot_succinct['foot_succinct_textarea'] : '';
        $foot_succinct_database_queries = isset($foot_succinct['foot_succinct_database_queries']) ? $foot_succinct['foot_succinct_database_queries'] : false;
?>
        <div class="leaf_footer_succinct_block">
            <div class="footer_succinct_icp_block">
                <p class="footer_succinct_icp"><svg class="icon" aria-hidden="true">
                        <use xlink:href="#icon-beian"></use>
                    </svg>备案号：<?php if (!empty($foot_succinct_icpnumber)) {
                                    echo esc_html($foot_succinct_icpnumber);
                                } ?></p>
                <p class="footer_moe_icp_succinct"><svg class="icon" aria-hidden="true">
                        <use xlink:href="#icon-beianxinxi-ICP-gonganbeian"></use>
                    </svg>萌备案号：<?php if (!empty($foot_succinct_moe_icpnumber)) {
                                    echo esc_html($foot_succinct_moe_icpnumber);
                                } ?></p>
            </div>
            <p class="footer_succinct_text_blcok"><?php if (!empty($foot_succinct_textarea)) {
                                                        echo $foot_succinct_textarea;
                                                    } ?></p>
            <p class="footer_succinct_mysql_blcok"><?php if ($foot_succinct_database_queries == true) { ?>数据库<?php echo get_num_queries(); ?>次查询 | 用时：<?php timer_stop(1, 7) ?>秒 | 消耗了：<?php echo memory_get_peak_usage() / 1024 / 1024; ?>MB 内存<?php } ?></p>
        </div>
        <div class="leaf_moblie_blcok">
            <p class="leaf_moblie_text"><?php if (!empty($foot_succinct_textarea)) {
                                            echo $foot_succinct_textarea;
                                        } ?></p>
        </div>
    <?php
    } else {
        $foot_complex = _leaf('foot_complex');
        $foot_logo_set = $foot_complex['foot_logo_set'];
        $foot_logo_text = $foot_complex['foot_complex_logo_text'];
        $foot_logo_img = $foot_complex['foot_complex_logo_img'];
        $foot_complex_text = $foot_complex['foot_complex_text'];
        $foot_complex_qr_code = isset($foot_complex['foot_complex_qr_code']) ? $foot_complex['foot_complex_qr_code'] : array();
        $foot_complex_links = isset($foot_complex['foot_complex_links']) ? $foot_complex['foot_complex_links'] : array();
        $foot_complex_logo_text_copyright = $foot_complex['foot_complex_logo_text_copyright'];
        $foot_complex_database_queries = $foot_complex['foot_complex_database_queries'];
        $foot_complex_links_switcher = $foot_complex['foot_complex_links_switcher'];
        $foot_complex_moe_icpnumber = $foot_complex['foot_complex_moe_icpnumber'];
        $foot_complex_icpnumber = $foot_complex['foot_complex_icpnumber'];
        $logo = '';
        if ($foot_logo_set == 'foot_text_logo') {
            $logo = '<p class="footer_logo_title">' . $foot_logo_text . '</p>';
        } elseif ($foot_logo_set == 'foot_img_logo') {
            $logo = '<a class="foot_logo_link leaf_link_all" href="'
                . get_bloginfo('url') . '"><img class="leaf-img_logo" src="' . $foot_logo_img . ' " alt="叶ACG主题"></a>';
        }

    ?>
        <div class="leaf_footer_link_profile_copyright_sideab_contact">
            <div class="leaf_footer_profile_contact_sideab_block">
                <div class="leaf_footer_profile_block">
                    <?php echo $logo; ?>
                    <p class="leaf_footer_profile"><?php echo $foot_complex_text; ?></p>
                </div>
                <div class="leaf_footer_sideab_block"></div>
                <div class="leaf_footer_contact_block">
                    <?php
                    if (!empty($foot_complex_qr_code)) {
                        foreach ($foot_complex_qr_code as $key) {
                            $foot_right_img = isset($key['foot_right_img']) ? $key['foot_right_img'] : '';
                            $foot_right_text = isset($key['foot_right_text']) ? $key['foot_right_text'] : '';
                    ?>
                            <div class="leaf_footer_contact_img_text">
                                <img class="leaf_footer_contact_img" src="<?php echo esc_url($foot_right_img); ?>">
                                <p class="leaf_footer_contact_text"><?php echo esc_html($foot_right_text); ?></p>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div><?php if ($foot_complex_links_switcher == true) { ?>
                <div class="leaf_footer_link_block">
                    <div class="leaf_footer_link_text_block">
                        <div class="leaf_footer_text_block">
                            <p class="leaf_footer_texe">友情链接：</p>
                        </div>
                        <div class="leaf_footer_link_img_block">
                            <?php if (!empty($foot_complex_links)) {
                                foreach ($foot_complex_links as $key) {
                                    $foot_complex_links_img = isset($key['foot_complex_links_img']) ? $key['foot_complex_links_img'] : '';
                                    $foot_complex_links_link = isset($key['foot_complex_links_link']) ? $key['foot_complex_links_link'] : '';
                            ?>
                                    <a class="leaf_footer_img_link leaf_link_all" href="<?php echo $foot_complex_links_link; ?>"> <img class="leaf_footer_link_img" src="<?php echo $foot_complex_links_img; ?>" alt=""></a>
                            <?php }
                            } ?>
                        </div>
                    </div>

                </div>
            <?php } ?>
            <div class="leaf_footer_copyright_block">
                <div class="leaf_footer_copyright"><?php echo $foot_complex_logo_text_copyright; ?>
                    <div class="footer_succinct_icp_block">
                        <p class="footer_succinct_icp"><svg class="icon" aria-hidden="true">
                                <use xlink:href="#icon-beian"></use>
                            </svg>备案号：<?php if (!empty($foot_complex_icpnumber)) {
                                            echo esc_html($foot_complex_icpnumber);
                                        } ?></p>
                        <p class="footer_moe_icp_succinct"><svg class="icon" aria-hidden="true">
                                <use xlink:href="#icon-beianxinxi-ICP-gonganbeian"></use>
                            </svg>萌备案号：<?php if (!empty($foot_complex_moe_icpnumber)) {
                                            echo esc_html($foot_complex_moe_icpnumber);
                                        } ?></p>
                    </div>
                </div>
                <?php if ($foot_complex_database_queries == true) { ?><div class="leaf_mysql_data">数据库<?php echo get_num_queries(); ?>次查询 | 用时：<?php timer_stop(1, 7) ?>秒 | 消耗了：<?php echo memory_get_peak_usage() / 1024 / 1024; ?>MB 内存</div><?php } ?>
            </div>
        </div>
        <div class="leaf_moblie_blcok">
            <p class="leaf_moblie_text"><?php echo $foot_complex_logo_text_copyright; ?></p>
        </div>
    <?php } ?>
<?php } ?>