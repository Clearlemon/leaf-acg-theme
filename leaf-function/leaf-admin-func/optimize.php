<?php
//以下为优化功能的全方面代码
//是否禁用前台管理员Banner
if (_leaf('optimize-admin-banner', true)) {
    function disable_admin_bar()
    {
        show_admin_bar(false);
    }
    add_action('init', 'disable_admin_bar');
}
//是否禁用Wordpress的XML-RPL功能
if (_leaf('optimize-xml-rpl', true)) {
    add_filter('xmlrpc_enabled', '__return_false');
}
//是否开启移除Wordpress的版本号功能
if (_leaf('optimize-wordpress-version', true)) {
    function remove_wp_version()
    {
        return '';
    }
    add_filter('the_generator', 'remove_wp_version');
}
//是否禁用Wordpress自动更新
if (_leaf('optimize-nowordpress-version', true)) {
    add_filter('auto_update_core', '__return_false');
}
//是否禁用Wordpress的古腾堡编辑器
if (_leaf('optimize-gutenberg-editor', true)) {
    add_filter('use_block_editor_for_post', '__return_false', 10);
    add_filter('classic_editor_enabled', '__return_true', 10);
}
//是否禁用Wordpress的区块小工具
if (_leaf('optimize-block-widgets', true)) {
    add_filter('use_widgets_block_editor', '__return_false');
    add_action('widgets_init', 'my_unregister_widgets');
    function my_unregister_widgets()
    {
        unregister_widget('WP_Widget_Archives');
        unregister_widget('WP_Widget_Calendar');
        unregister_widget('WP_Widget_Categories');
        unregister_widget('WP_Widget_Links');
        unregister_widget('WP_Widget_Meta');
        unregister_widget('WP_Widget_Pages');
        unregister_widget('WP_Widget_Recent_Comments');
        unregister_widget('WP_Widget_Recent_Posts');
        unregister_widget('WP_Widget_Tag_Cloud');
        unregister_widget('WP_Widget_Text');
        unregister_widget('WP_Nav_Menu_Widget');
        unregister_widget('WP_Widget_Media_Audio');
        unregister_widget('WP_Widget_Media_Image');
        unregister_widget('WP_Widget_Media_Gallery');
        unregister_widget('WP_Widget_Media_Video');
    }
}
//是否禁用表情功能
if (_leaf('optimize-emoji', true)) {
    function disable_emoji()
    {
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('admin_print_styles', 'print_emoji_styles');
        remove_filter('the_content_feed', 'wp_staticize_emoji');
        remove_filter('comment_text_rss', 'wp_staticize_emoji');
        remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    }
    add_action('init', 'disable_emoji');
}
//是否禁用前台的古腾堡编辑器
if (_leaf('optimize-gutenberg-reception-style', true)) {
    function disable_block_library_style()
    {
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
        wp_dequeue_style('wp-block-library-editor');
    }
    add_action('wp_enqueue_scripts', 'disable_block_library_style');
    add_action('admin_enqueue_scripts', 'disable_block_library_style');
}
//是否禁用前台的经典编辑器样式
if (_leaf('optimize-classic-reception-style', true)) {
    function remove_default_styles()
    {
        wp_dequeue_style('classic-theme-styles');
        wp_deregister_style('classic-theme-styles');
    }
    add_action('wp_enqueue_scripts', 'remove_default_styles', 20);
}

//是否禁用版本修订
if (_leaf('optimize-postings-revision', true)) {
    add_action('wp_print_scripts', 'fanly_no_autosave');
    function fanly_no_autosave()
    {
        wp_deregister_script('autosave');
    }
    add_filter('wp_revisions_to_keep', 'fanly_wp_revisions_to_keep', 10, 2);
    function fanly_wp_revisions_to_keep($num, $post)
    {
        return 0;
    }
}
//是否禁用Wordpress的图像限制功能
if (_leaf('optimize-image-restrictions', true)) {
    function remove_image_size_limits()
    {
        add_filter('big_image_size_threshold', '__return_false');
    }
    add_action('after_setup_theme', 'remove_image_size_limits');
}
//是否禁用Wordpress的多图片尺寸功能
if (_leaf('optimize-multiple-image-sizes', true)) {
    function disable_image_sizes($sizes)
    {
        unset($sizes['thumbnail']);
        unset($sizes['medium']);
        unset($sizes['large']);
        unset($sizes['medium_large']);
        unset($sizes['1536x1536']);
        unset($sizes['2048x2048']);
        return $sizes;
    }
    add_filter('intermediate_image_sizes_advanced', 'disable_image_sizes');
    add_filter('big_image_size_threshold', '__return_false');
}
//是否禁用字符转码
if (_leaf('optimize-character-to-ma', true)) {
    remove_filter('the_content', 'wptexturize');
    remove_filter('the_title', 'wptexturize');
    remove_filter('the_excerpt', 'wptexturize');
    remove_filter('widget_text_content', 'wptexturize');
}
//是否禁用
if (_leaf('optimize-picture-properties', true)) {
    function remove_image_attributes($html)
    {
        $html = preg_replace('/(width|height)="\d*"\s/', '', $html);
        return $html;
    }
    add_filter('post_thumbnail_html', 'remove_image_attributes');
    add_filter('image_send_to_editor', 'remove_image_attributes');
}
//是否禁用REST API
if (_leaf('optimize-rest-api', true)) {
    add_filter('rest_authentication_errors', function ($result) {
        if (!empty($result)) {
            return $result;
        }
        if (!is_user_logged_in()) {
            return new WP_Error('rest_not_logged_in', 'You are not currently logged in.', array('status' => 401));
        }
        return $result;
    });
}
//是否禁用Trackbacks/Pingbacks
if (_leaf('optimize-trackbacks-pingbacks', true)) {
    function disable_trackbacks()
    {
        global $wp;
        $wp->query_vars['tb'] = false;
        $wp->query_vars['ping'] = false;
    }
    add_action('template_redirect', 'disable_trackbacks');
}
//是否禁用dns-prefetch
if (_leaf('optimize-dns-prefetch', true)) {
    function remove_dns_prefetch()
    {
        remove_action('wp_head', 'wp_resource_hints', 2);
    }
    add_action('init', 'remove_dns_prefetch');
}
//是否禁用translations_api函数
if (_leaf('optimize-translations-api', true)) {
    function disable_translations_api()
    {
        remove_action('init', 'wp_maybe_load_translations');
    }
    add_action('after_setup_theme', 'disable_translations_api');
}
//是否禁用wp_check_php_version函数
if (_leaf('optimize-check-php', true)) {
    function disable_php_version_check()
    {
        remove_action('wp_die_handler', 'wp_check_php_version');
    }
    add_action('after_setup_theme', 'disable_php_version_check');
}
//是否禁用wp_check_browser_version函数
if (_leaf('optimize-check-browser', true)) {
    function disable_browser_version_check()
    {
        remove_action('wp_footer', 'wp_check_browser_version');
    }
    add_action('after_setup_theme', 'disable_browser_version_check');
}

//头像优化
if (!function_exists('get_cravatar_url')) {
    /**
     *  把Gravatar头像服务替换为Cravatar
     * @param string $url
     * @return string
     */
    function get_cravatar_url($url)
    {
        $sources = array(
            'www.gravatar.com',
            '0.gravatar.com',
            '1.gravatar.com',
            '2.gravatar.com',
            'secure.gravatar.com',
            'cn.gravatar.com'
        );
        return str_replace($sources, 'cn.gravatar.com', $url);
    }
    add_filter('um_user_avatar_url_filter', 'get_cravatar_url', 1);
    add_filter('bp_gravatar_url', 'get_cravatar_url', 1);
    add_filter('get_avatar_url', 'get_cravatar_url', 1);
}
