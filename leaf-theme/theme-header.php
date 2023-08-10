<header class="leaf-header-all">
    <div class="leaf_sidebar_nav_shrink">
        <div class="leaf_sidebar_nav_all">
            <?php leaf_sidebar_moblie_all(); ?>
            <?php $mobile_locations = get_nav_menu_locations();
            if (isset($mobile_locations['leaf_head_nav'])) {
                wp_nav_menu(
                    array(
                        'menu' => 'leaf_head_nav',
                        'theme_location' => 'leaf_head_nav',
                        'depth' => 3,
                        'container' => 'div',
                        'container_class' => 'leaf_sidebar_nav_block',
                        'menu_class' => 'leaf-menu-sidebar-ul-block',
                        'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                        'walker' => new Leaf_Sidebar_Nav_Create_style,
                    )
                );
            }
            ?>
            <div class="leaf_sidebar_user_setting_block"></div>
            <div class="leaf_sidebar_gadget_block"></div>
        </div>
        <div class="leaf_sidebar_nav_black" onclick="closeSearch()"></div>
    </div>
    <div class="leaf_search_eject_block_all_shrink">
        <div class="leaf_search_mobile_black" onclick="closeSearch()"></div>
        <div class="leaf_search_eject_block">
            <form class="mobile_navbar-form" id="searchform" action="<?php echo get_bloginfo('url'); ?>">
                <div class="leaf-banner_search">
                    <input class="leaf_searc_input_box" type="text" class="form-control" name="s" size="35" placeholder="搜素一下？" id="keywords" maxlength="100">
                    <span class="input-group-btn">
                        <input type="submit" value="搜索" class="leaf_search_but" id="searchsubmit">
                    </span>
                </div>
            </form>
        </div>
    </div>
    <div class="leaf-navtop_bigbackground">
        <div class="leaf_header_block">
            <?php leaf_logo_text_img(); ?>
            <div class="leaf_head_nav_search_user">
                <div class="leaf_sidebar_nav">
                    <svg class="leaf_sidebar_nav_ali_icon" aria-hidden="true">
                        <use xlink:href="#icon-row-full"></use>
                    </svg>
                </div>
                <?php if (_leaf('mobile-close-logo') == 'mobile-home-img-logo') {
                    leaf_mobile_logo_text_img();
                } else {
                    echo '<div class="mobile_nav_logo_block" ></div>';
                } ?>
                <?php $locations = get_nav_menu_locations();
                if (isset($locations['leaf_head_nav'])) {
                    wp_nav_menu(
                        array(
                            'menu' => 'leaf_head_nav',
                            'theme_location' => 'leaf_head_nav',
                            'depth' => 3,
                            'container' => 'nav',
                            'container_class' => 'leaf-headnav',
                            'menu_class' => 'leaf-menu-ul',
                            'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                            'walker' => new Leaf_Nav_Create_style(),
                        )
                    );
                } ?>
                <div class="leaf_header_search_user">
                    <?php leaf_close_search_fun(); ?>
                    <div class="leaf-user_img_admin">
                        <?php leaf_loging_enroll_user(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php leaf_banner_genre(); ?>
</header>