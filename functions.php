<?php
require_once get_theme_file_path('/leaf-function/leaf-admin-func/fnc.php');
function disable_classic_theme_style() {
    wp_dequeue_style('classic-theme');
    wp_deregister_style('classic-theme');
}
add_action('wp_enqueue_scripts', 'disable_classic_theme_style', 999);
