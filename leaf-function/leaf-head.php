<?php
//图片LOGO判断函数
function leaf_logo_text_img()
{
    $close_logo = _leaf('close-logo');
    $leaf_home_url = get_bloginfo('url');
    $leaf_blog_name = get_bloginfo('name');

    if ($close_logo == 'text-logo') {
        $logo_tabbed_text = _leaf('logo-tabbed-text');

        if (is_array($logo_tabbed_text)) {
            $logo_tabbed_text = implode(' ', $logo_tabbed_text);
        }

        echo '<div class="logo_text logo_img_text"><a href="' . $leaf_home_url . '"><h4 class="leaf_logo_titel_h4">' . $logo_tabbed_text . '</h4></a></div>';
    } elseif ($close_logo == 'img-logo') {

        $logo_tabbed_img = _leaf('logo-tabbed-img');
        if (is_array($logo_tabbed_img)) {
            $logo_tabbed_img = implode(' ', $logo_tabbed_img);
        }
        echo '<div class="logo_img logo_img_text"><a href="' . $leaf_home_url . '"><img class="leaf-img_logo" src="' . $logo_tabbed_img . '" alt="' . $leaf_blog_name . '"></a></div>';
    }
}

//检查当前用户是否为登录状态
function leaf_loging_enroll_user()
{
    if (is_user_logged_in()) {
        $current_user_id = get_current_user_id();
        $avatar_url = get_avatar_url($current_user_id);
?>
        <div class="leaf_login_enroll_avatar">
            <img class="leaf_loginng_avatar" src="<?php echo esc_url($avatar_url); ?>">
        </div>
    <?php
    } else {
    ?>
        <div class=" leaf_login_enroll_img">
            <i class="login_img" style="background-image: url(<?php echo get_template_directory_uri(); ?>/leaf-assets/leaf-images/logo_bgq.png);"></i>
            <span class="leaf-user_login"><a href="">登录</a></span>
            <b class="login-enroll-texte"><span>or</span></b>
            <span class="leaf-user_enroll"><a href="">注册</a></span>
            <i class="enroll_img"></i>
        </div>
    <?php
    }
}


// 获取全局颜色函数
function leaf_theme_overall_color()
{
    //获取全局颜色的值
    $leaf_theme_color = _leaf('leaf_theme_overall_color');
    $leaf_text_color = _leaf('leaf_text_overall_color');
    $leaf_text_color_skin = _leaf('leaf_text_overall_color_skin');
    $leaf_theme_color_skin = _leaf('leaf_theme_overall_color_skin');
    ?>
    :root {
    <?php
    if ($leaf_theme_color == '' && $leaf_theme_color_skin == '') {
    } else {
        if ($leaf_theme_color == '') {
            $leaf_theme_color_skin = _leaf('leaf_theme_overall_color_skin');
            echo '--wp-leaf-all-color:#' . $leaf_theme_color_skin . ';';
        } else {
            echo '--wp-leaf-all-color:' . $leaf_theme_color . ';';
        }
    }
    ?>

    <?php
    if ($leaf_text_color == '' && $leaf_text_color_skin == '') {
    } else {
        if ($leaf_text_color == '') {
            $leaf_text_color_skin = _leaf('leaf_text_overall_color_skin');
            echo '--wp-leaf-all-text-size-color:#' . $leaf_text_color_skin . ';';
        } else {
            echo '--wp-leaf-all-text-size-color:' . $leaf_text_color . ';';
        }
    }
    ?>
    }
<?php
}

//注册导航栏菜单
register_nav_menus(array(
    'leaf_head_nav' => '头部导航',
    'leaf_footer_nav' => '页脚导航'
));
add_theme_support('nav_menus');

//菜单样式自定义
class Leaf_Nav_Create_style extends Walker_Nav_Menu
{
    //这里是菜单栏的高级用法看各行解释吧~ 
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        global $wp_query;
        $indent = ($depth > 0 ? str_repeat("\t", $depth) : ''); // 缩进

        // 定义li的样式
        $depth_classes = array(
            ($depth == 0 ? 'leaf_first_menu' : 'leaf-second_menu'),   //一级的li，就main-menu-item，其余全部sub-menu-item
            ($depth >= 2 ? 'sub-sub-menu-item' : ''),  //三级的li，添加这个样式
            ($depth % 2 ? 'menu-item-odd' : 'menu-item-even'),    //奇数加样式menu-item-odd,偶数加样式menu-item-even
            'menu-item-depth-' . $depth,    //层级同上
        );
        $depth_class_names = esc_attr(implode(' ', $depth_classes));

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = esc_attr(implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item))); //这句我没看懂，不知道是在干啥

        // 把样式合成到li里面
        $output .= $indent . '<li id="nav-menu-item-' . $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

        // 处理a的属性
        $attributes  = !empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target)     ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url)        ? ' href="'   . esc_attr($item->url) . '"' : '';
        $attributes .= ' class="menu-link ' . ($depth > 0 ? 'sub-menu-link' : 'leaf_link_all') . '"';

        //添加a的样式
        $item_output = sprintf(
            '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
            $args->before,
            $attributes,
            $args->link_before,
            apply_filters('the_title', $item->title, $item->ID),
            $args->link_after,
            $args->after
        );
        //上面这个item_output我要说一下。这里写的有点死。
        //如果一级菜单是<a><span>我是菜单</span></a>
        //然而其他级菜单是<a><strong>我是菜单</strong></a>
        //这样的情况，$args->link_before是固定值就不行了，要自行判断
        //$link_before = $depth == 0 ? '<span>' : '<strong>';
        //$link_after = $depth == 0 ? '</span>' : '</strong>';
        //类似这个意思。
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);

        //定义ul的样式
        $indent = str_repeat("\t", $depth);
        $sub_menu_class = ($depth === 1) ? 'leaf-menu_inli_ul' : 'leaf-menu_inli_inul_ul';

        // 寻找现有的ul元素，并添加新的类
        $output = str_replace('<ul class="sub-menu">', '<ul class="' . $sub_menu_class . '">', $output);
    }
}
