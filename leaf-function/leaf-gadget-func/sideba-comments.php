<?php
class Leaf_home_comments extends WP_Widget
{
//注册小工具
    function __construct()
    {
        parent::__construct(false, 'Leaf-最新评论');
    }
//输出内容
    function widget($args, $instance){

    }
}

function Leaf_home_comments_widgets()
{
    register_widget('Leaf_home_comments');
}
add_action('widgets_init', 'Leaf_home_comments_widgets');

?>