<?php
class Leaf_home_time extends WP_Widget
{
//注册小工具
    function __construct()
    {
        parent::__construct(false, 'Leaf-时间');
    }
//输出内容
    function widget($args, $instance){

    }
}

function Leaf_home_time_widgets()
{
    register_widget('Leaf_home_time');
}
add_action('widgets_init', 'Leaf_home_time_widgets');

?>