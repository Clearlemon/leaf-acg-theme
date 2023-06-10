<?php
// 载入所需文件
// 一行一个文件
$files = array(
    // 前台文件
    'template/function/maple-admin/maple-admin.php',
    'template/function/maple-admin/widget.php',
    'template/function/maple-theme/maple-nav.php',
    'template/function/maple-theme/maple-ajax.php',
    'template/function/maple-gadget/postings-user.php',
    'template/function/maple-gadget/gadget-location.php',
    'template/function/maple-admin/maple-editor.php',
    // 后台设置文件
    'admin-function/maple-framework.php',
    'admin-function/frame/maple-admin-options.php',
    'admin-function/frame/maple-nav-options.php',
);

foreach ($files as $file) {
    require_once get_theme_file_path('/' . $file);
}
