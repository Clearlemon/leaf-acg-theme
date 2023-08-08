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
//         'name' => 'say', // 自定义文章类型的名称
//         'labels' => array(
//             'name' => '说说', // 自定义文章类型的名称
//             'singular_name' => '写说说', // 自定义文章类型的单数形式名称
//         ),
//         'taxonomies' => array('category', 'post_tag'),
//         'supports' => array('title', 'editor', 'author', 'thumbnail', 'comments', 'category', 'tags'), // 设置支持的功能
//         'menu_icon' => get_template_directory_uri() . '/leaf-assets/leaf-images/leaf-setings-demo/saysay.png', // 设置图标路径
//         'menu_position' => 6,
//     );
//     register_post_type('say', $args); // 将 'post_type' 参数改为 'say'
// }
// add_action('init', 'custom_post_type');


// // 禁止删除示例页面
// function prevent_example_page_deletion($post_ID)
// {
//     $page_title = '示例页面';

//     if (get_the_title($post_ID) == $page_title) {
//         wp_die("无法删除示例页面。");
//     }
// }
// add_action('before_delete_post', 'prevent_example_page_deletion');

// 启用友情链接功能
add_filter('pre_option_link_manager_enabled', '__return_true');
// 修改“Link Manager”为“友情链接”
function modify_link_manager_name($name)
{
    return '友情链接';
}
add_filter('admin_menu', 'modify_link_manager_menu');

function modify_link_manager_menu()
{
    global $menu;
    foreach ($menu as $key => $value) {
        if ($value[0] == '链接') { // 找到原始的“链接”菜单
            $menu[$key][0] = '友情链接'; // 修改菜单名称
            break;
        }
    }
}



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


    wp_enqueue_style('leaf-header', get_template_directory_uri() . '/leaf-assets/leaf-style/leaf-header.css', array(), $var, 'all');
    wp_enqueue_style('leaf-footer', get_template_directory_uri() . '/leaf-assets/leaf-style/leaf-footer.css', array(), $var, 'all');
    wp_enqueue_style('leaf-sideba-all', get_template_directory_uri() . '/leaf-assets/leaf-style/leaf-sideba-all.css', array(), $var, 'all');
    wp_enqueue_style('leaf-slide-min', get_template_directory_uri() . '/leaf-assets/leaf-style/leaf-slide.min.css', array(), $var, 'all');

    //如果是首页则加载，如果不是则不加载
    if (is_home()) {
        wp_enqueue_style('leaf-home', get_template_directory_uri() . '/leaf-assets/leaf-style/leaf-home.css', array(), $var, 'all');
        wp_enqueue_script('leaf', get_template_directory_uri() . '/leaf-assets/leaf-javascript/leaf.js', array(), $var, true);
    }
    //如果时搜索页则加载，如果不是则不加载
    if (is_search()) {
        wp_enqueue_style('leaf-search', get_template_directory_uri() . '/leaf-assets/leaf-style/leaf-search.css', array(), $var, 'all');
        wp_enqueue_style('leaf-home', get_template_directory_uri() . '/leaf-assets/leaf-style/leaf-home.css', array(), $var, 'all');
        wp_enqueue_script('leaf-search', get_template_directory_uri() . '/leaf-assets/leaf-javascript/leaf-search.js', array(), $var, true);
    }
    //如果是归档页则加载，如果不是则不加载
    if (is_archive()) {
        wp_enqueue_style('leaf-category', get_template_directory_uri() . '/leaf-assets/leaf-style/leaf-category.css', array(), $var, 'all');
        wp_enqueue_style('leaf-home', get_template_directory_uri() . '/leaf-assets/leaf-style/leaf-home.css', array(), $var, 'all');
        wp_enqueue_script('leaf-category', get_template_directory_uri() . '/leaf-assets/leaf-javascript/leaf-category.js', array(), $var, true);
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
        wp_enqueue_script('leaf-sideba-netease-music-min', get_template_directory_uri() . '/leaf-assets/leaf-javascript/leaf-sideba-netease-music.min.js', array(), $var, false);
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

    if (is_active_widget(false, false, 'leaf_home_one_word', true)) {
        wp_enqueue_script('leaf-sideba-one-word', get_template_directory_uri() . '/leaf-assets/leaf-javascript/leaf-sideba-one-word.js', array(), $var, true);
    }

    //引用阿里巴巴失衡图标
    wp_enqueue_script('ali', '//at.alicdn.com/t/c/font_4198813_1v7y9n9kyau.js', array(), $var, true);
    //引用本地JQ插件
    wp_enqueue_script('leaf-jq', get_template_directory_uri() . '/leaf-assets/leaf-javascript/jquery.js', array(), $var, false);
    wp_enqueue_script('leaf-slide-jq-min', get_template_directory_uri() . '/leaf-assets/leaf-javascript/leaf-slide-jq.min.js', array(), $var, false);
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

//获取文章模块的设置
if (!function_exists('leaf_post')) {
    function _leaf_post($leaf_post_key = '', $leaf_post_mate_key = '', $default = null)
    {
        $leaf_post = get_post_meta(get_the_ID(), 'leaf-theme-post', true);
        $leaf_post_mate = get_post_meta(get_the_ID(), 'leaf-theme-post_meta', true);

        if ($leaf_post_key !== '' && isset($leaf_post[$leaf_post_key])) {
            return $leaf_post[$leaf_post_key];
        } elseif ($leaf_post_mate_key !== '' && isset($leaf_post_mate[$leaf_post_mate_key])) {
            return $leaf_post_mate[$leaf_post_mate_key];
        } else {
            return $default;
        }
    }
}
