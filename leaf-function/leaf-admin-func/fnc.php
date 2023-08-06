<?php
// 一行一个文件|载入所需文件
$files = array(
    //后台函数文件
    'leaf-function/leaf-admin-func/other.php',
    'leaf-function/leaf-admin-func/editor.php',
    'leaf-function/leaf-admin-func/optimize.php',
    //前台模板函数文件
    'leaf-function/index.php',
    //后台主题设置文件
    'admin-function/leaf-framework.php',
    'admin-function/index.php',
    //加载所有侧边栏文件 & 小工具位置
    'leaf-function/leaf-gadget-func/index.php',
    'leaf-function/leaf-gadget-func/sideba-all.php',
    //加载所有的短代文件
    'leaf-function/leaf-shortcodes/index.php',
);
foreach ($files as $file) {
    require_once get_theme_file_path('/' . $file);
}
