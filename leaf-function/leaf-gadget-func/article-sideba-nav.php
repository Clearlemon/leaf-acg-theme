<?php

class Leaf_article_nav extends WP_Widget
{
    // 注册小工具
    function __construct()
    {
        parent::__construct(false, 'Leaf-文章内页导航信息');
    }
    
    // 输出内容
    function widget($args, $instance)
    {
        // 在这里输出小工具的内容
    }
    
    // 更新小工具设置
    function update($new_instance, $old_instance)
    {
        // 在这里处理并更新小工具设置
    }
    
    // 显示小工具设置表单
    function form($instance)
    {
        // 在这里显示小工具设置表单的字段
    }
}

function Leaf_article_nav_widgets()
{
    register_widget('Leaf_article_nav');
}
add_action('widgets_init', 'Leaf_article_nav_widgets');

// 在初始化时加载Codestar Framework的Widget Option Framework
function load_codestar_widget_options()
{
    if (class_exists('CSFramework_Widget'))
    {
        new CSFramework_Widget();
    }
}
add_action('widgets_init', 'load_codestar_widget_options');

?>
