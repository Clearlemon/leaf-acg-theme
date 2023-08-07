<header class="leaf-header-all">
    <!-- 菜单栏总体布局开始 -->
    <div class="leaf-navtop_bigbackground">
        <div class="leaf_header_block">
            <!-- LOGO图开始 -->
            <?php leaf_logo_text_img(); ?>
            <!-- LOGO图结束 -->
            <!-- 菜单导航开始 -->
            <div class="leaf_head_nav_search_user">
                <div class="leaf_sidebar_nav">
                    <svg class="leaf_sidebar_nav_ali_icon" aria-hidden="true">
                        <use xlink:href="#icon-row-full"></use>
                    </svg>
                </div>
                <?php leaf_mobile_logo_text_img(); ?>
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
                    <!-- 菜单导航结束 -->
                    <!-- 搜索框开始 -->
                    <form class="navbar-form" id="searchform" action="<?php echo get_bloginfo('url'); ?>">
                        <div class="leaf-banner_search">
                            <input class="leaf_searc_input_box" type="text" class="form-control" name="s" size="35" placeholder="搜素一下？" id="keywords" maxlength="100">
                            <span class="input-group-btn">
                                <input type="submit" value="搜索" class="leaf_search_but" id="searchsubmit">
                            </span>
                        </div>
                    </form>
                    <div class="leaf_pop_up_search">
                        <svg class="leaf_search_ali_icon" aria-hidden="true">
                            <use xlink:href="#icon-icon-sousuo"></use>
                        </svg>
                    </div>
                    <!-- 搜索框结束 -->
                    <!-- 右侧登录注册开始 -->
                    <div class="leaf-user_img_admin">
                        <?php leaf_loging_enroll_user(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 右侧登录注册结束 -->
    <!-- 菜单栏总体布局结束 -->
    <!-- 大图Banner开始 -->
    <?php leaf_banner_genre(); ?>

    <!-- 大图Banner结束 -->
</header>