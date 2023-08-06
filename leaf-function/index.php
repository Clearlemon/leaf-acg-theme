<?php
// 一行一个文件|载入所需文件
$files = array(
    //浅谈输出函数
    'leaf-function/leaf-head.php',
    'leaf-function/leaf-comments.php',
    'leaf-function/leaf-single.php',
    'leaf-function/leaf-index.php',
    'leaf-function/leaf-search.php',
    'leaf-function/leaf-category.php',
    //顶部Banner函数设置
    'leaf-function/leaf-other/leaf-banner.php',
    //幻灯片设置功能
    'leaf-function/leaf-slide/slide-first.php',
);
foreach ($files as $file) {
    require_once get_theme_file_path('/' . $file);
}
