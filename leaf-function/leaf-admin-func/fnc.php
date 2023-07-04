<?php
// 一行一个文件|载入所需文件
$files = array(
    //后台函数文件
    'leaf-function/leaf-admin-func/other.php',
    //后台小工具设置
    'leaf-function/leaf-gadget-func/sideba-all.php',
    //后台主题设置文件
    'admin-function/leaf-framework.php',
    'admin-function/frame/leaf-admin-options.php',
    'admin-function/frame/leaf-comment-options.php',
    'admin-function/frame/leaf-customize-options.php',
    'admin-function/frame/leaf-metabox-options.php',
    'admin-function/frame/leaf-nav-menu-options.php',
    'admin-function/frame/leaf-profile-options.php',
    'admin-function/frame/leaf-shortcode-options.php',
    'admin-function/frame/leaf-taxonomy-options.php',
    'admin-function/frame/leaf-widget-options.php',
    //加载所有侧边栏文件
    'leaf-function/leaf-gadget-func/article-sideba-nav.php',
    'leaf-function/leaf-gadget-func/article-sideba-user.php',
    'leaf-function/leaf-gadget-func/sideba-article-hot.php',
    'leaf-function/leaf-gadget-func/sideba-colored-labels.php',
    'leaf-function/leaf-gadget-func/sideba-comments.php',
    'leaf-function/leaf-gadget-func/sideba-netease-music.php',
    'leaf-function/leaf-gadget-func/sideba-one-word.php',
    'leaf-function/leaf-gadget-func/sideba-time.php',
    'leaf-function/leaf-gadget-func/sideba-video.php',
    'leaf-function/leaf-gadget-func/sideba-weather.php',
    'leaf-function/leaf-gadget-func/sidebar-ip-address.php',
    'leaf-function/leaf-gadget-func/sidebar-users.php',
);
foreach ($files as $file) {
    require_once get_theme_file_path('/' . $file);
}