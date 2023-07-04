<?php
class Leaf_home_article_hot extends WP_Widget
{
//注册小工具
    function __construct()
    {
        parent::__construct(false, 'Leaf-热榜文章');
    }
//输出内容
    function widget($args, $instance){

    }
}

function Leaf_home_article_hot_widgets()
{
    register_widget('Leaf_home_article_hot');
}
add_action('widgets_init', 'Leaf_home_article_hot_widgets');

?>