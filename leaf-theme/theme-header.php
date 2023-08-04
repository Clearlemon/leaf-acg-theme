<header class="leaf-header-all">
    <!-- 菜单栏总体布局开始 -->
    <div class="leaf-navtop_bigbackground">
        <!-- LOGO图开始 -->
        <?php leaf_logo_text_img(); ?>
        <!-- LOGO图结束 -->
        <!-- 菜单导航开始 -->
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
        <!-- 搜索框结束 -->
        <!-- 右侧登录注册开始 -->
        <div class="leaf-user_img_admin">
            <?php leaf_loging_enroll_user(); ?>
        </div>
    </div>
    <!-- 右侧登录注册结束 -->
    <!-- 菜单栏总体布局结束 -->
    <!-- 大图Banner开始 -->
    <div class="leaf-head_nav_backgroundimg">
        <img class="leaf_header_banner_bg" src="<?php echo get_template_directory_uri(); ?>/leaf-assets/leaf-images/bacg.jpg" width="100%" height="40%" alt="">
        <div class="leaf_title-speech">
            <h1 class="leaf_h1_title">生命的美好就是在那一瞬</h1>
            <h2 class="leaf_h4_title">你好世界</h2>
        </div>
    </div>
    <!-- 大图Banner结束 -->
</header>