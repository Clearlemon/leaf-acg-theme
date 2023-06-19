<?php
//全局CSS和JS文件
function leaf_scripts_styles(){
    // 引用JavaScript文件
    wp_enqueue_script('leaf-min', get_template_directory_uri() . '/leaf-assets/leaf-javascript/leaf.min.js', array(), '1.0', true);
    wp_enqueue_script('leaf', get_template_directory_uri() . '/leaf-assets/leaf-javascript/leaf.js', array(), '1.0', true);
    // 引用CSS文件
    wp_enqueue_style('leaf-home', get_template_directory_uri() . '/leaf-assets/leaf-style/leaf-home.css', array(), '1.0','all');
}
add_action('wp_enqueue_scripts', 'leaf_scripts_styles');
//获取后台的设置选项函数
if ( ! function_exists( '_leaf' ) ) {
    function _leaf( $option = '', $default = null ) {
    $options = get_option('leaf-themes'); 
    return ( isset( $options[$option] ) ) ? $options[$option] : $default;
}
}
//以下为优化功能的全方面代码
//是否禁用前台管理员Banner
if (_leaf('optimize-admin-banner', true)) {
    function disable_admin_bar() {
        show_admin_bar( false );
    }
    add_action( 'init', 'disable_admin_bar' );    
}
//是否禁用Wordpress的XML-RPL功能
if (_leaf('optimize-xml-rpl', true)) {
add_filter( 'xmlrpc_enabled', '__return_false' );
}
//是否开启移除Wordpress的版本号功能
if (_leaf('optimize-wordpress-version', true)) {
    function remove_wp_version() {
        return '';
    }
    add_filter('the_generator', 'remove_wp_version');
}
//是否禁用translations_api函数
if (_leaf('optimize-translations-api', true)) {
function disable_translations_api() {
    remove_action('init', 'wp_maybe_load_translations');
}
add_action('after_setup_theme', 'disable_translations_api');
}
//是否禁用wp_check_php_version函数
if (_leaf('optimize-check-php', true)) {
function disable_php_version_check() {
    remove_action('wp_die_handler', 'wp_check_php_version');
}
add_action('after_setup_theme', 'disable_php_version_check');
}
//是否禁用wp_check_browser_version函数
if (_leaf('optimize-check-browser', true)) {
function disable_browser_version_check() {
    remove_action('wp_footer', 'wp_check_browser_version');
}
add_action('after_setup_theme', 'disable_browser_version_check');
}