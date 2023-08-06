<?php
$files = array(
    //主题设置文件
    'admin-function/leaf-options/leaf-admin-options.php',
    // 'admin-function/leaf-options/leaf-customize-options.php',
    'admin-function/leaf-options/leaf-metabox-options.php',
    'admin-function/leaf-options/leaf-nav-menu-options.php',
    'admin-function/leaf-options/leaf-profile-options.php',
    'admin-function/leaf-options/leaf-taxonomy-options.php',
);
foreach ($files as $file) {
    require_once get_theme_file_path('/' . $file);
}
