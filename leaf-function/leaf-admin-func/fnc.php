<?php
// 载入所需文件
// 一行一个文件
$files = array(
    // 前台文件
    // 后台设置文件
    'admin-function/leaf-framework.php',
    'admin-function/frame/leaf-admin-options.php',
    'admin-function/frame/leaf-nav-options.php',
);

foreach ($files as $file) {
    require_once get_theme_file_path('/' . $file);
}
