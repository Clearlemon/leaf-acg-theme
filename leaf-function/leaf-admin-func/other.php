<?php
//检查主题是否第一次激活
// if (is_admin() && isset($_GET['activated']) && 'themes.php' == $GLOBALS['pagenow']) {
//     // 创建示例页面
//     $page_title = '示例页面';
//     $page_content = '这是示例页面的内容。';
//     $page_template = 'template-example.php'; // 自定义页面模板文件名

//     // 检查示例页面是否已存在
//     $page_check = get_page_by_title($page_title);

//     if (!$page_check) {
//         // 创建示例页面
//         $page_args = array(
//             'post_title'   => $page_title,
//             'post_content' => $page_content,
//             'post_status'  => 'publish',
//             'post_type'    => 'page',
//         );

//         // 插入页面并获取页面 ID
//         $page_id = wp_insert_post($page_args);

//         if ($page_id && !is_wp_error($page_id)) {
//             // 设置页面模板
//             update_post_meta($page_id, '_wp_page_template', $page_template);
//         }
//     }
// }

// 注册自定义文章类型
// function custom_post_type()
// {
//     $args = array(
//         'public' => true, // 是否公开可见
//         'labels' => array(
//             'name' => '说说', // 自定义文章类型的名称
//             'singular_name' => '写说说', // 自定义文章类型的单数形式名称
//         ),
//         'taxonomies' => array('category', 'post_tag'),
//         'supports' => array('title', 'editor', 'author', 'thumbnail', 'comments', 'category', 'tags'), // 设置支持的功能
//         'menu_icon' => get_template_directory_uri() . '/leaf-assets/leaf-images/leaf-setings-demo/saysay.png', // 设置图标路径
//         'menu_position' => 6,
//     );
//     register_post_type('custom_post_type', $args);
// }
// add_action('init', 'custom_post_type');

// // 禁止删除示例页面
// function prevent_example_page_deletion($post_ID) {
//     $page_title = '示例页面';

//     if (get_the_title($post_ID) == $page_title) {
//         wp_die("无法删除示例页面。");
//     }
// }
// add_action('before_delete_post', 'prevent_example_page_deletion');


//注册导航栏菜单
register_nav_menus(array(
    'leaf_head_nav' => '头部导航',
    'leaf_footer_nav' => '页脚导航'
));
add_theme_support('nav_menus');


// // 启用友情链接功能
// add_filter('pre_option_link_manager_enabled', '__return_true');
// // 修改“Link Manager”为“友情链接”
// function modify_link_manager_name($name) {
//     return '友情链接';
// }
// add_filter('admin_menu', 'modify_link_manager_menu');

// function modify_link_manager_menu() {
//     global $menu;
//     foreach ($menu as $key => $value) {
//         if ($value[0] == '链接') { // 找到原始的“链接”菜单
//             $menu[$key][0] = '友情链接'; // 修改菜单名称
//             break;
//         }
//     }
// }


// 获取文章的阅读次数
function get_post_views($post_id)
{

    $count_key = 'views';
    $count = get_post_meta($post_id, $count_key, true);

    if ($count == '') {
        delete_post_meta($post_id, $count_key);
        add_post_meta($post_id, $count_key, '0');
        $count = '0';
    }

    echo number_format_i18n($count);
}

// 设置更新文章的阅读次数
function set_post_views()
{

    global $post;

    $post_id = $post->ID;
    $count_key = 'views';
    $count = get_post_meta($post_id, $count_key, true);

    if (is_single() || is_page()) {

        if ($count == '') {
            delete_post_meta($post_id, $count_key);
            add_post_meta($post_id, $count_key, '0');
        } else {
            update_post_meta($post_id, $count_key, $count + 1);
        }
    }
}
add_action('get_header', 'set_post_views');


//后台引入样式文件
function enqueue_custom_admin_styles()
{
    //引用主题的设置样式文件
    wp_enqueue_style('leaf', CSF::include_plugin_url('assets/css/leaf.css'), array(), '1.0.0', 'all');
    wp_enqueue_style('leaf-min', CSF::include_plugin_url('assets/css/leaf.min.css'), array(), '1.0.0', 'all');
}
add_action('admin_enqueue_scripts', 'enqueue_custom_admin_styles');

//前台全局CSS和JS文件
function leaf_scripts_styles()
{

    $var = '1.0';  // 版本号（注意是字符串类型）

    //引用主题的JavaScript和CSS 文件
    wp_enqueue_script('leaf-min', get_template_directory_uri() . '/leaf-assets/leaf-javascript/leaf.min.js', array(), $var, true);
    wp_enqueue_script('leaf', get_template_directory_uri() . '/leaf-assets/leaf-javascript/leaf.js', array(), $var, true);
    wp_enqueue_style('leaf-header', get_template_directory_uri() . '/leaf-assets/leaf-style/leaf-header.css', array(), $var, 'all');
    wp_enqueue_style('leaf-footer', get_template_directory_uri() . '/leaf-assets/leaf-style/leaf-footer.css', array(), $var, 'all');
    wp_enqueue_style('leaf-sideba-all', get_template_directory_uri() . '/leaf-assets/leaf-style/leaf-sideba-all.css', array(), $var, 'all');
    //如果是首页则加载，如果不是则不加载
    if (is_home()) {
        wp_enqueue_style('leaf-home', get_template_directory_uri() . '/leaf-assets/leaf-style/leaf-home.css', array(), $var, 'all');
    }
    //如果是文章页则加载，如果不是则不加载
    if (is_single()) {
        wp_enqueue_style('leaf-single', get_template_directory_uri() . '/leaf-assets/leaf-style/leaf-single.css', array(), $var, 'all');
        wp_enqueue_style('leaf-shortcodes', get_template_directory_uri() . '/leaf-assets/leaf-style/leaf-shortcodes.css', array(), $var, 'all');
        wp_enqueue_style('leaf-video-plyr', get_template_directory_uri() . '/leaf-assets/leaf-style/leaf-sideba-video-plyr.css', array(), $var, 'all');
        wp_enqueue_style('leaf-comment', get_template_directory_uri() . '/leaf-assets/leaf-style/leaf-comment.css', array(), $var, 'all');
        wp_enqueue_script('leaf-single', get_template_directory_uri() . '/leaf-assets/leaf-javascript/leaf-single.js', array(), $var, true);
        wp_enqueue_script('leaf-video-plyr', get_template_directory_uri() . '/leaf-assets/leaf-javascript/leaf-sideba-video-plyr.js', array(), $var, false);
        wp_enqueue_script('leaf-comment', get_template_directory_uri() . '/leaf-assets/leaf-javascript/leaf-comment.js', array(), $var, false);
    }
    //图标字体本地引用
    wp_enqueue_style('leaf-font-awesome', get_template_directory_uri() . '/leaf-assets/leaf-style/leaf-font-awesome.css', array(), $var, 'all');

    //侧边栏播放器本地引用
    if (is_active_widget(false, false, 'leaf_home_netease_music', true)) {
        wp_enqueue_script('leaf-sideba-netease-music', get_template_directory_uri() . '/leaf-assets/leaf-javascript/leaf-sideba-netease-music.js', array(), $var, false);
        wp_enqueue_style('leaf-sideba-netease-music', get_template_directory_uri() . '/leaf-assets/leaf-style/leaf-sideba-netease-music.css', array(), $var, 'all');
    }

    //视频本地引用
    if (is_active_widget(false, false, 'leaf_home_video', true)) {
        wp_enqueue_script('leaf-video-plyr', get_template_directory_uri() . '/leaf-assets/leaf-javascript/leaf-sideba-video-plyr.js', array(), $var, false);
        wp_enqueue_style('leaf-video-plyr', get_template_directory_uri() . '/leaf-assets/leaf-style/leaf-sideba-video-plyr.css', array(), $var, 'all');
    }

    //侧边栏3D标签本地引用
    if (is_active_widget(false, false, 'leaf_home_colored_labels', true)) {
        wp_enqueue_script('leaf-tages-3d', get_template_directory_uri() . '/leaf-assets/leaf-javascript/leaf-sideba-tages-3d.js', array(), $var, false);
        wp_enqueue_style('leaf-tages-3d', get_template_directory_uri() . '/leaf-assets/leaf-style/leaf-sideba-tages-3d.css', array(), $var, 'all');
    }

    //侧边栏时间本地引用
    if (is_active_widget(false, false, 'leaf_home_time', true)) {
        wp_enqueue_script('leaf-sideba-time', get_template_directory_uri() . '/leaf-assets/leaf-javascript/leaf-sideba-time.js', array(), $var, true);
        wp_enqueue_style('leaf-sideba-time', get_template_directory_uri() . '/leaf-assets/leaf-style/leaf-sideba-time.css', array(), $var, 'all');
    }

    //引用阿里巴巴失衡图标
    wp_enqueue_script('leaf-sideba-time', '//at.alicdn.com/t/c/font_4141464_eds3zcbwko6.js', array(), $var, true);
}
add_action('wp_enqueue_scripts', 'leaf_scripts_styles');

//获取后台的设置选项函数
if (!function_exists('_leaf')) {
    function _leaf($option = '', $default = null)
    {
        $options = get_option('leaf-themes');
        return (isset($options[$option])) ? $options[$option] : $default;
    }
}

$isMobile = wp_is_mobile();
if ($isMobile) { ?>
    <html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
        <style>
            * {
                margin: 0;
                padding: 0;
                list-style: none;
                text-decoration: none;
            }

            body {
                background-image: url(http://www.98qy.com/sjbz/api.php);
                background-position-x: center;
                background-size: cover;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .mobile-all {
                height: 50%;
                width: 75%;
                display: flex;
                justify-content: center;
                flex-direction: column;
                align-items: center;
                border-radius: 15px;
                backdrop-filter: saturate(200%) blur(30px);
                background-color: hsl(0deg 0% 100% / 50%) !important;
            }

            h2 {
                padding: 10px;
            }

            p {
                padding: 10px;
            }

            .button>* {
                margin: 20px 0px;
            }

            button {
                height: 30px;
                width: 100px;
                margin: 0px 10px;
                border: none;
                background-color: hsl(0deg 0% 100% / 50%) !important;
            }
        </style>
    </head>

    <body>
        <div class="mobile-all">
            <h2>ACG叶主题</h2>
            <p>很抱歉各位，移动端样式还并未开发，请各位见谅，也请给位用PC端预览，敬请期待哦~~~【开源进主题群给主题提意见捏~~~】</p>
            <div class="button">
                <a href="http://qm.qq.com/cgi-bin/qm/qr?_wv=1027&k=N2T0mL4vKokAfNLcTCagQBREy6sAmcmX&authKey=8r3bZ%2Bd%2FhUZZns33mff771UXno9%2BrbmqRJLZ5JXtO3Efx5ncXuCRnK0Lmm0R0X8L&noverify=0&group_code=785428622"><button>主题群</button></a>
                <a href="https://github.com/Clearlemon/leaf-acg-theme"><button>GitHub地址</button></a>
            </div>
        </div>
    </body>

    </html>
<?php
    exit;
}
