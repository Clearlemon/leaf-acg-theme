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
//是否禁用Wordpress自动更新
if (_leaf('optimize-nowordpress-version', true)) {
add_filter( 'auto_update_core', '__return_false' );
}
//是否禁用Wordpress的古腾堡编辑器
if (_leaf('optimize-gutenberg-editor', true)) {
add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('classic_editor_enabled', '__return_true', 10);
}
//是否禁用Wordpress的区块小工具
if (_leaf('optimize-block-widgets', true)) {
add_filter('gutenberg_use_widgets_block_editor', '__return_false');
add_filter('classic_widgets_block_editor', '__return_true');
}
//是否禁用表情功能
if (_leaf('optimize-emoji', true)) {
function disable_emoji() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', 'disable_emoji_tinymce');
}
add_action('init', 'disable_emoji');
}
//是否禁用前台的古腾堡编辑器
if (_leaf('optimize-gutenberg-reception-style', true)) {
function disable_block_library_style() {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme'); 
    wp_dequeue_style('wp-block-library-editor'); 
}
add_action('wp_enqueue_scripts', 'disable_block_library_style');
add_action('admin_enqueue_scripts', 'disable_block_library_style');
}
//是否禁用前台的经典编辑器样式
if (_leaf('optimize-classic-reception-style', true)) {
function disable_classic_editor_style() {
    wp_dequeue_style('classic-editor-styles'); 
}
add_action('wp_enqueue_scripts', 'disable_classic_editor_style');
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