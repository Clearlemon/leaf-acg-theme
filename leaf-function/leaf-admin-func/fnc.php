<?php
// 一行一个文件|载入所需文件
$files = array(
    //后台函数文件
    'leaf-function/leaf-admin-func/other.php',
    'leaf-function/leaf-admin-func/editor.php',
    'leaf-function/leaf-admin-func/article.php',
    'leaf-function/leaf-admin-func/optimize.php',
    //前台模板函数文件
    'leaf-function/leaf-comments.php',
    'leaf-function/leaf-single.php',
    //后台小工具设置
    'leaf-function/leaf-gadget-func/sideba-all.php',
    //后台主题设置文件
    'admin-function/leaf-framework.php',
    'admin-function/frame/leaf-admin-options.php',
    'admin-function/frame/leaf-customize-options.php',
    'admin-function/frame/leaf-metabox-options.php',
    'admin-function/frame/leaf-nav-menu-options.php',
    'admin-function/frame/leaf-profile-options.php',
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
    //加载所有的短代文件
    'leaf-function/leaf-shortcodes/index.php',
    'leaf-function/leaf-shortcodes/short-hide-codes/short-hide-codes.php',
    'leaf-function/leaf-shortcodes/short-fold-codes/short-fold-codes.php',
    'leaf-function/leaf-shortcodes/short-video-codes/short-video-codes.php',
    'leaf-function/leaf-shortcodes/short-click-view-codes/short-click-view-codes.php',
    'leaf-function/leaf-shortcodes/short-background-codes/short-background-codes.php',
    'leaf-function/leaf-shortcodes/short-reply-view-codes/short-reply-view-codes.php',
    'leaf-function/leaf-shortcodes/short-intensifier-all-codes/short-intensifier-all-codes.php',
    'leaf-function/leaf-shortcodes/short-password-viewing-codes/short-password-viewing-codes.php',
);
foreach ($files as $file) {
    require_once get_theme_file_path('/' . $file);
}
