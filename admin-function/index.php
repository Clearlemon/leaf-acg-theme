<?php
$files = array(
    //主题模块设置文件
    'admin-function/leaf-options/leaf-admin-options.php',
    //主题实时预览模块设置
    'admin-function/leaf-options/leaf-customize-options.php',
    //主题文章独立功能模块设置
    'admin-function/leaf-options/leaf-metabox-options.php',
    //主题导航模块设置
    'admin-function/leaf-options/leaf-nav-menu-options.php',
    //主题用户模块设置
    'admin-function/leaf-options/leaf-profile-options.php',
    //主题分类模块设置
    'admin-function/leaf-options/leaf-taxonomy-options.php',
);
foreach ($files as $file) {
    require_once get_theme_file_path('/' . $file);
}
