<?php
class Leaf_home_colored_labels extends WP_Widget
{
//注册小工具
    function __construct()
    {
        parent::__construct(false, 'Leaf-彩色标签云');
    }
//输出内容
    function widget($args, $instance){

    }
}

function Leaf_home_colored_labels_widgets()
{
    register_widget('Leaf_home_colored_labels');
}
add_action('widgets_init', 'Leaf_home_colored_labels_widgets');

?>