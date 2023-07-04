<?php
class Leaf_article_user extends WP_Widget
{
//注册小工具
    function __construct()
    {
        parent::__construct(false, 'Leaf-文章内页用户信息');
    }
//输出内容
    function widget($args, $instance){

    }
}

function Leaf_article_user_widgets()
{
    register_widget('Leaf_article_user');
}
add_action('widgets_init', 'Leaf_article_user_widgets');

?>