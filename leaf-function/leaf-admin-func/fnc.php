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
    'admin-function/frame/leaf-nav-options.php',
    'admin-function/frame/leaf-widgets-options.php',
);
foreach ($files as $file) {
    require_once get_theme_file_path('/' . $file);
}

