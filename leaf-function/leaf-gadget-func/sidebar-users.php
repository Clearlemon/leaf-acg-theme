<?php
class Leaf_home_user extends WP_Widget
{
//注册小工具
    function __construct()
    {
        parent::__construct(false, 'Leaf-首页用户信息');
    }
//输出内容
    function widget($args, $instance){

    }
}

function Leaf_home_user_widgets()
{
    register_widget('Leaf_home_user');
}
add_action('widgets_init', 'Leaf_home_user_widgets');

?>