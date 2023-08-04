<?php
add_filter('mce_external_plugins', 'add_plugin');
add_filter('mce_buttons', 'register_button');
function register_button($buttons)
{
    array_push($buttons, "|", "cntent_password_viewing", "cntent_reply_view", "cntent_hidden", "cntent_fold", "cntent_click_view", "cntent_background", "cntent_video"); // 添加一个短代码按钮
    return $buttons;
}

function add_plugin($plugin_array)
{
    $plugin_array['cntent_hidden'] = get_template_directory_uri() . '/leaf-function/leaf-shortcodes/short-hide-codes/short-hide-codes.js'; // 后台短代码按钮的js路径
    $plugin_array['cntent_fold'] = get_template_directory_uri() . '/leaf-function/leaf-shortcodes/short-fold-codes/short-fold-codes.js'; // 后台短代码按钮的js路径
    $plugin_array['cntent_background'] = get_template_directory_uri() . '/leaf-function/leaf-shortcodes/short-background-codes/short-background-codes.js'; // 后台短代码按钮的js路径
    $plugin_array['cntent_video'] = get_template_directory_uri() . '/leaf-function/leaf-shortcodes/short-video-codes/short-video-codes.js'; // 后台短代码按钮的js路径
    $plugin_array['cntent_reply_view'] = get_template_directory_uri() . '/leaf-function/leaf-shortcodes/short-reply-view-codes/short-reply-view-codes.js'; // 后台短代码按钮的js路径
    $plugin_array['cntent_password_viewing'] = get_template_directory_uri() . '/leaf-function/leaf-shortcodes/short-password-viewing-codes/short-password-viewing-codes.js'; // 后台短代码按钮的js路径
    $plugin_array['cntent_click_view'] = get_template_directory_uri() . '/leaf-function/leaf-shortcodes/short-click-view-codes/short-click-view-codes.js'; // 后台短代码按钮的js路径
    return $plugin_array;
}

// 一行一个文件|载入所需文件
$files = array(
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
